<?php


namespace app\controller\admin;


use app\model\User;

class UserController extends AppController
{
    public function loginAdminAction()
    {
        $this->layout = 'login';
        if (!empty($_POST))
        {
            $user = new User();
            if ($user->login(true))
            {
                $_SESSION['success'] = 'Authorization successful';
            } else {
                $_SESSION['error'] = 'Login or password is incorrect';
            }
            if ($user::isAdmin())
            {
                redirect(ADMIN);
            } else {
                redirect(PATH);
            }

        }
    }

    public function logoutAdminAction()
    {
        session_unset();
        redirect(PATH);
    }
}