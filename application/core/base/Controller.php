<?php


namespace app\core\base;


abstract class Controller
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $layout;
    public $prefix;
    public $data = array();
    public $ajax;

    public function __construct($route)
    {
        $this->route      = $route;
        $this->model      = $route['controller'];
        $this->controller = $route['controller'];
        $this->view       = $route['action'];
        $this->prefix     = $route['prefix'];
        $this->ajax       = false;
    }

    public function getView()
    {
        if (!$this->ajax)
        {
            $viewObject = new View($this->route, $this->layout, $this->view);
            $viewObject->render($this->data);
        }
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

}