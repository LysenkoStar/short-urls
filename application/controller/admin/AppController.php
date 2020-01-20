<?php

namespace app\controller\admin;

use app\core\base\Controller;
use app\model\User;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        if (!User::isAdmin() && $route['action'] !== 'login-admin')
        {
            redirect(ADMIN . '/user/login-admin');
        }
    }

}