<?php

namespace fw\core\base;

use fw\core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }
}
