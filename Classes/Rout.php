<?php

class Rout
{

    public $controller;
    public $action;

    public function __construct()
    {
        if(isset($_GET['r']))
        {
            $rout = $_GET['r'];
            $routParts = explode('/', $rout);
            if(2 === count($routParts))
            {
                $this->controller = $routParts[0];
                $this->action = $routParts[1];
            }else{
                $this->controller = 'news';
                $this->action = 'all';
            }
        }
    }
}