<?php

namespace App;


class View
{
	public $content;
	public $fileName;

	public function getContent($fileName)
	{
		return 'views/'.$fileName.'.php';
    }
    

    public function __construct()
    {
        if (isset($_GET['url']))
        {
            if($_GET['url'] == 'index.php/home;')
            {
                include_once (new View())->content('home');

            } elseif ($_GET['url'] == 'index.php/index;') {
                include_once (new View())->content('index');
            }


            $routes = 0;

            foreach($routes as $name => $action)
            {
                if($_GET['url'] == 'index.php/0');
            }

        }
    }

    

}
