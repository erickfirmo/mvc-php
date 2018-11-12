<?php

namespace Core;

use DBConnection;

class Model
{
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
        $db = $this->getPDOConnection();
        $sql = 'SELECT * FROM '.$this->table;
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $db = $this->getPDOConnection();
        $sql = 'DELETE FROM '.$this->table.' WHERE id='.$id;
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}

    