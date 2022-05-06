<?php

namespace Core;

use PDO;

class DB
{
    const DB_HOST = 'DB_HOST';
    const DB_NAME = 'DB_NAME';
    const DB_USERNAME = 'DB_USERNAME';
    const DB_PASSWORD = 'DB_PASSWORD';

    private static $db;

    public static function get(): PDO
    {
        if (self::$db) {
            return self::$db;
        }

        self::$db = self::createNewInstance();
        return self::$db;
    }

    private static function createNewInstance(): PDO
    {
        $host = Config::get(self::DB_HOST);
        $dbName = Config::get(self::DB_NAME);
        $dsn = "mysql:dbname=$dbName;host=$host";
        $user = Config::get(self::DB_USERNAME);
        $pass = Config::get(self::DB_PASSWORD);

        return new PDO($dsn, $user, $pass);
    }
}
