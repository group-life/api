<?php

namespace GroupLife\Api\Database;

use Doctrine\DBAL\DriverManager;

class DBConnection
{
    public static function connect(): \Doctrine\DBAL\Connection
    {
        return DriverManager::getConnection([
            'url' => 'sqlite:///' . MAIN_FOLDER . '\tests\lib\test.db'
        ]);
    }
}
