<?php

namespace Core;

use DBConnection;

class Model
{
    protected $paginate = false;
    protected $limit = false;
    protected $cascade = false;
    protected $action = NULL;
    public $pivot_entity = NULL;
    public $pivot_parent_id = NULL;
    public $pivot_table = NULL;

    public function getPDOConnection()
    {
        return (new DBConnection())->getPDOConnection();
    }

    //crud methods
    public function save()
    {    
        $fields = NULL;
        $values = NULL;
        foreach ($this->fields as $key => $field)
        {
            if(count($this->fields) != $key+1)
            {
                $fields = $fields.$field.',';
                $values = $values.'?,';
            } else {
                $fields = $fields.$field;
                $values = $values.'?';
            }
        }
        $db = $this->getPDOConnection();
        $sql = 'INSERT INTO '.$this->table.' ('.$fields.') VALUES ('.$values.')';
        $stmt = $db->prepare($sql);
        foreach ($this->fields as $key => $field)
        {  
            $stmt->bindValue($key+1, $this->$field);
        }
        $stmt->execute();
        define('PARAMETER', $db->lastInsertId(), true);
    }

    public function find($id)
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$this->table.' WHERE id='.$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $register = $stmt->fetch();
        return $this->createObject($register, static::class);
    }

    public function update(array $updates)
    {    
        $fields = NULL;
        foreach ($this->fields as $key => $field)
        {
            if(count($this->fields) != $key+1)
            {
                $fields = $fields.' '.$field.'= :'.$field.',';
            } else {
                $fields = $fields.' '.$field.'= :'.$field;
            }
        }
        $db = $this->getPDOConnection();
        $sql = 'UPDATE '.$this->table.' SET '.$fields.' WHERE id="'.$this->id.'"';
        $stmt = $db->prepare($sql);
        foreach ($updates as $key => $update)
        {  
            $stmt->bindValue(':'.$key, $update);
        }
        $stmt->execute();
    }

    public function all()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $db = $this->getPDOConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll();
        if($this->paginate)
        {
            $this->setPagination($registers);
            $sql = 'SELECT * FROM '.$this->table.' LIMIT '.$this->getLimit();
            if($_SESSION['PAGE'] > 1)
            {
                $sql = $sql.' OFFSET '.($_SESSION['PAGE'] - 1)*$this->getLimit();
            }
            $_SESSION['PAGINATE'] = true;
            $db = $this->getPDOConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $registers = $stmt->fetchAll(); 
        } else {
            $_SESSION['PAGINATE'] = false;
        }
        return $this->objectsConstruct($registers, $this->getNameOfClass());
    }

    public function where($condition)
    {
        $sql = 'SELECT * FROM '.$this->table.' WHERE '.$condition;
        $db = $this->getPDOConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll();
        if($this->paginate)
        {
            $this->setPagination($registers);
            $sql = 'SELECT * FROM '.$this->table.' WHERE '.$condition;
            
            $sql = $sql.' LIMIT '.$this->getLimit();
            if($_SESSION['PAGE'] > 1)
            {
                $sql = $sql.' OFFSET '.($_SESSION['PAGE'] -1)*$this->getLimit();
            }
            $db = $this->getPDOConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $registers = $stmt->fetchAll();
        }
        return $this->objectsConstruct($registers, static::class);
    }

    public function delete($id)
    {
        $db = $this->getPDOConnection();
        $sql = 'DELETE FROM '.$this->table.' WHERE id='.$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    //pagination methods
    public function setPagination($registers)
    {
        $_SESSION['PAGES_NUMBER'] = count($registers) / $this->getLimit();
    }

    public function paginate($limit)
    {
        $this->paginate = true;
        $this->limit = $limit;
        return $this;
    }
     
    public function getLimit()
    {
        return $this->limit;
    }

    public function getNameOfClass()
   {
      return static::class;
   }

    //construct methods
    public function createObject($register, $class_name)
    {
        if(!$register)
        {
            return NULL;
        } else {
            $obj = new $class_name;
            foreach ($register as $key => $value)
            {
                $obj->$key = $value;
            }
            return $obj;
        }
    }
    
    public function objectsConstruct($registers, $class_name)
    {
        $objects = [];
        if(!empty($registers))
        {
            foreach ($registers as $register)
            {
                array_push($objects, $this->createObject($register, $class_name));
            }
        }
        
        return $objects;
    }

    //relationship methods
    public function hasMany($entity, $parent_id)
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$entity->table.' WHERE '.$parent_id.'='.$this->id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll();
        return $this->objectsConstruct($registers, $entity->getNameOfClass());
    }

    public function belongsTo($entity, $parent_id)
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$entity->table.' WHERE id='.$this->$parent_id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetch();
        return $this->createObject($registers, $entity->getNameOfClass());
    }

    public function hasOne()
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$entity->table.' WHERE id='.$this->$parent_id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetch();
        return $this->createObject($registers, $entity->getNameOfClass());
    }

    //pivot
    public function setPivot($pivot_entity, $pivot_parent_id, $parent_table)
    {
        $pivot_params = [];
        $pivot_params['entity'] = $pivot_entity->getNameOfClass();
        $pivot_params['table'] = $pivot_entity->table;
        $pivot_params['parent_id'] = $pivot_parent_id;
        $pivot_params['parent_table'] = $parent_table;
        $_SESSION['PIVOT_PARAMS'] = $pivot_params;
    }

    public function findPivot($pivot_entity_name, $pivot_table, $pivot_parent_id, $parent_table, $value)
    {
        $db = $this->getPDOConnection();   
        $sql = 'SELECT pivot.id FROM '.$pivot_table.' AS pivot INNER JOIN '.$parent_table.' AS parent ON pivot.'.$pivot_parent_id.'=parent.id';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $register = $stmt->fetch();
        $obj = $this->createObject($register, $pivot_entity_name);
        $obj->pivot_entity = $pivot_entity_name;
        $obj->pivot_parent_id = $pivot_parent_id;
        $obj->pivot_table = $pivot_table;
        return $obj;
    }

    public function findBy($attr, $value)
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$this->table.' WHERE '.$attr.'="'.$value.'"';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $register = $stmt->fetch();
        return $this->createObject($register, static::class);
    }

    public function pivot()
    {
        $pivot_params = $_SESSION['PIVOT_PARAMS'];
        $pivot_entity_name = $pivot_params['entity'];
        return $this->findPivot($pivot_entity_name, $pivot_params['table'], $pivot_params['parent_id'], $pivot_params['parent_table'], $this->id);
    }

    public function belongsToMany($entity, $pivot_entity, $parent_id_a, $parent_id_b)
    {
        $this->setPivot($pivot_entity, $parent_id_a, $this->table);
        $db = $this->getPDOConnection();
        $fields = NULL;
        foreach ($entity->fields as $key => $field)
        {
            if(count($entity->fields) == $key+1)
            {
                $fields = $fields.''.$field;
            } else {
                $fields = $fields.' '.$field.', ';
            }
        }
        $sql = 'SELECT '.$entity->table.'.id, '.$fields.' FROM '.$entity->table.' RIGHT JOIN '.$pivot_entity->table.' AS pivot ON pivot.'.$parent_id_a.'='.$this->id.' AND pivot.'.$parent_id_b.'='.$entity->table.'.id WHERE '.$entity->table.'.id IS NOT NULL';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll();
        $object = $this->objectsConstruct($registers, $entity->getNameOfClass());
        return $object;
    }

    //auxiliares
    public function writeParents($relationMethods, $attr)
    {
        $content = null;
        if($this->$relationMethods() != null)
        {
            foreach ($this->$relationMethods() as $key => $register) {
                if(count($this->$relationMethods()) == 1 || count($this->$relationMethods()) == $key-1)
                    $content = $content.$register->$attr;
                else 
                    $content = $content.$register->$attr.', ';
            }
        } else {
            return '(Nenhum)';
        }
        return $content;
    }
}
