<?php


namespace app\controllers;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public function signUpAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save($user->tableUser)) {
                $_SESSION['success'] = 'Registration completed successfully!';
                $user->login();
                redirect('/');
            } else {
                $_SESSION['error'] = 'Registration failed, try again!';
            }
            redirect();
        }

        View::setMeta("Registration");
    }

    public function loginAction()
    {
        if (!empty($_POST)) {
            $user = new User();
            if ($user->login()) {
                $_SESSION['success'] = 'Authorization is SUCCESS!';
            } else {
                $_SESSION['error'] = 'Authorization is NOT SUCCESS! - check <b>Login</b> and <b>Paswword</b>';
                redirect();
            }
            redirect('/');
        }

        View::setMeta("LogIn");
    }

    public function logoutAction()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        redirect('/user/login');
    }
}