<?php


namespace app\controller;


use app\core\base\Controller;
use app\model\AppModel;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }

}