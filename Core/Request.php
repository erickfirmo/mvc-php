<?php

namespace Core;

class Request
{
    public $status = true;
    
    public function __construct()
    {

    }
    
    public function input($inputName)
    {
        if(isset($_POST[$inputName]))
            return $_POST[$inputName];
    }

    public function validate(array $rules)
    {
        $alerts = [];
        foreach ($rules as $inputName => $rule)
        {
            $rulesArray = explode('|', $rule);
            foreach ($rulesArray as $r)
            {
                $rArray = explode(':', $r);
                $rAction = $rArray[0];   
                $rParam = $rArray[1];     
                array_push($alerts, $this->$rAction($inputName, $rParam));    
            }   
        }

        if($this->status == false)
        {
            $_SESSION['alert_error'] = $alerts;
            header('location: '.$_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function required($inputName, $param=0)
    {
        if(!isset($_POST[$inputName]) || empty($_POST[$inputName]))
        {
            $this->status = false;
            return 'O campo '.$inputName.' é obrigatório.';
        }
    }

    public function max($inputName, $max)
    {
        if($max < strlen($_POST[$inputName]))
        {
            $this->status = false;
            return 'O campo '.$inputName.' não deve ter mais que '.$max.' caracteres.';
        }
    }

    public function min($inputName, $min)
    {
        if($min > strlen($_POST[$inputName]))
        {
            $this->status = false;
            return 'O campo '.$inputName.' deve ter mais que '.$min.' caracteres.';
        }
    }

    public function datatype($inputName, $type)
    {
        if($type != gettype($_POST[$inputName]))
        {
            $this->status = false;
            return 'O campo '.$inputName.' deve ser do tipo '.$type.'.';
        }
    }
}