<?php


namespace app\models;

class User extends \fw\core\base\Model
{
    public $tableUser = 'user';

    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ],
    ];

    public function checkUnique()
    {
        $user = \R::findOne($this->tableUser, 'login = ? OR email = ? LIMIT 1', [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = "This login <b>" . $this->attributes['login'] . "</b> is already taken";
            }
            if ($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = "This email <b>" . $this->attributes['email'] . "</b> is already taken";
            }
            return false;
        }
        return true;
    }
}
