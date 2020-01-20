<?php

namespace app\core\base;

use Exception;

class View
{

    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $data = array();
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route      = $route;
        $this->model      = $route['controller'];
        $this->controller = $route['controller'];
        $this->view       = $view;
        $this->prefix     = str_replace('\\', '/', $route['prefix']);
        if ($layout === false)
        {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data)
    {
        if (is_array($data)) extract($data);

        $viewFile = APP . "/view/{$this->prefix}{$this->controller}/{$this->view}.php";

        if (is_file($viewFile))
        {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new Exception('View not found for this page.', 500);
        }
        if (false !== $this->layout)
        {
           $layoutFile = APP . "/view/layouts/{$this->layout}.php";
           if (is_file($layoutFile))
           {
               require_once $layoutFile;
           } else {
               throw new Exception('Template not found for this page.', 500);
           }
        }
    }

}