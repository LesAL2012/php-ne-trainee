<?php

namespace fw\core;

use \RedBeanPHP\R;

/**
 * Singleton - only one instance from class Db
 */
class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';

        R::setup($db['dsn'], $db['username'], $db['password']);
        R::freeze(true);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}