<?php

namespace Core;

class View
{
    public function getViewResponse($view, $values=0)
    {
        if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;

        $this->setView($view);
        $this->setLayout(include '../views'.$view.'.php');
        include '../views/layouts/'.$this->getLayout().'.php';
    }

    protected function setLayout($layout)
    {
        define('LAYOUT', $layout);
    }

    protected function getLayout()
    {
        return constant('LAYOUT');
    }

    protected function setView($view)
    {
        define('CONTENT', $view);
    }

    public function alert($alert)
    {
        $_SESSION['alert_success'] = $alert;
    }
}
