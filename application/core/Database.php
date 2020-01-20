<?php


namespace app\core;

use Exception;
use \RedBeanPHP\R as R;


class Database
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/database.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if (!R::testConnection()) throw new Exception('Database connection not established', 500);
        R::freeze(true);
        if (DEBUG) R::debug(true, 1);
    }

}