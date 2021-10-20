<?php

declare(strict_types=1);

namespace GroupLife\Api\Tests\integration;

use GroupLife\Api\Database\DBConnection;
use PHPUnit\Framework\TestCase;

class DBConnectionTest extends TestCase
{
    public function testConnectionToDB(): void
    {
        $db = DBConnection::connect();
        self::assertEquals('test.db', basename($db->getDatabase()));

    }

    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function testInsertValueToDB(): void
    {
        $db = DBConnection::connect();
        $db->insert('visitor', ['name' => 'Ivan', 'surname' => 'Petrov']);
        $result = $db->fetchAssociative('SELECT * FROM visitor');
        self::assertEquals(
            [
                'id' => '1',
                'name' =>'Ivan',
                'surname' => 'Petrov'
            ], $result
        );
    }
}
