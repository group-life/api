<?php

namespace GroupLife\Api\Controller;

use Doctrine\DBAL\Connection;

class TestController
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function test($response)
    {
        $this->connection->insert('visitor', ['name' => 'Test', 'surname' => 'Test']);
        $response->getBody()->write('Test passed');
        return $response;
    }
}
