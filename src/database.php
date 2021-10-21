<?php

declare(strict_types=1);

use Doctrine\DBAL\DriverManager;

function database(): \Doctrine\DBAL\Connection
{
    return DriverManager::getConnection([
        'url' => 'sqlite:///' . __DIR__ . '/../tests/lib/test.db'
    ]);
}
