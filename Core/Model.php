<?php

namespace Core;

use DBConnection;

class Model
{
    public $paginate = false;
    public $limit = false;

    public function __construct()
    {
        $_SESSION['PAGINATE'] = false;
    }

    public function getPDOConnection()
    {
        return (new DBConnection())->getPDOConnection();
    }

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
        define('PARAMETER', $db->lastInsertId());
    }

    public function find($id)
    {
        define('PARAMETER', $id);
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$this->table.' WHERE id='.$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchObject();
        if(!$row)
            die('Nothing Found');
        else
            return $row;
    }

    public function update(array $updates)
    {    
        $fields = NULL;
        foreach ($this->fields as $key => $field)
        {
            if(count($this->fields) != $key+1)
            {
                $fields = $fields.' '.$field.' = :'.$field.',';
            } else {
                $fields = $fields.' '.$field.' = :'.$field;
            }
        }
        $db = $this->getPDOConnection();
        $sql = 'UPDATE '.$this->table.' SET '.$fields.' WHERE id='.constant('PARAMETER');
        $stmt = $db->prepare($sql);
        foreach ($updates as $key => $update)
        {  
            $stmt->bindValue(':'.$key, $update);
        }
        $stmt->execute();
    }

    public function all()
    {
        $this->query = 'SELECT * FROM '.$this->table;
        $db = $this->getPDOConnection();
        $stmt = $db->prepare($this->query);
        $stmt->execute();
        $registers = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        if($this->paginate)
        {
            $this->setPagination($registers);
            $sql = 'SELECT * FROM '.$this->table;
            
            $sql = $sql.' LIMIT '.$this->getLimit();
            if($_SESSION['PAGE'] > 1)
            {
                $sql = $sql.' OFFSET '.($_SESSION['PAGE'] - 1)*$this->getLimit();
            }
            $db = $this->getPDOConnection();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $registers = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return $registers;
    }

    public function where($condition)
    {

        $sql = 'SELECT * FROM '.$this->table.' WHERE '.$condition;
        $db = $this->getPDOConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll(\PDO::FETCH_OBJ);

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
            $registers = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return $registers;
    }

    public function setPagination($registers)
    {
        $_SESSION['PAGES_NUMBER'] = count($registers) / $this->getLimit();
    }

    public function paginate($limit)
    {
        $this->paginate = true;
        $_SESSION['PAGINATE'] = true;

        $this->limit = $limit;
        return $this;
    }
     
    public function getLimit()
    {

        return $this->limit;
    }

    public function delete($id)
    {
        $db = $this->getPDOConnection();
        $sql = 'DELETE FROM '.$this->table.' WHERE id='.$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }

    /* -- */

    
    //clientes hasMany dividas

    public function hasMany()
    {
        $db = $this->getPDOConnection();
        $sql = 'SELECT '.$this->table.'*, '.$many.'';
    }

    //dividas belongsTo clientes;

    public function belongsTo()
    {

    }

    public function belongsToMany()
    {

    }



    





}

    