<?php

namespace Core;

class View
{
    public function __construct()
    {
        require_once __DIR__.'/../views/vendor/section.php';
        require_once __DIR__.'/../views/vendor/alert.php';
        require_once __DIR__.'/../views/vendor/paginations/pagination.php';
        require_once __DIR__.'/../views/vendor/active-url.php';
        require_once __DIR__.'/../views/vendor/auth.php';
        require_once __DIR__.'/../views/vendor/page-assets.php';
        require_once __DIR__.'/../helpers/route.php';
        require_once __DIR__.'/../helpers/url.php';
        require_once __DIR__.'/../helpers/partial.php';
        $this->tokenGenerator();
    }

    public function responseValues($values)
    {
        if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;
    }
    
    public function getViewResponse($view, $values=0)
    {
        if($values != NULL)
            foreach($values as $responseName => $responseValue)
                $$responseName = $responseValue;

        $this->setView($view);
        $this->setLayout(include '../views'.$view.'.php');
        include '../views/layouts/'.$this->getLayout().'.php';
    }

    protected function tokenGenerator()
    {
        $_SESSION['_token'] = md5(uniqid(rand(), true));
        require_once __DIR__.'/../views/vendor/token.php';
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

    public function alert($status, $alert)
    {
        $_SESSION['alert-'.$status] = $alert;
    }
}
