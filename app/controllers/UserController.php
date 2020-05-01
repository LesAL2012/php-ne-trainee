<?php


namespace app\controllers;

use app\models\User;

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
            } else {
                $_SESSION['error'] = 'Registration failed, try again!';
            }
            redirect();
        }

        $this->setMeta("Registration");
        $meta = $this->meta;

        $this->set(compact('meta'));
    }

    public function loginAction()
    {

        $this->setMeta("Login");
        $meta = $this->meta;

        $this->set(compact('meta'));
    }

    public function logoutAction()
    {
    }

}