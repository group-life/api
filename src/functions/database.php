<?php

declare(strict_types=1);

namespace GroupLife\Api;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

/**
 * @throws \Doctrine\DBAL\Exception
 */
function database(): Connection
{
    return DriverManager::getConnection([
        'url' => 'sqlite:///' . realpath(__DIR__ . '/../../tests/lib/test.db')
    ]);
}
