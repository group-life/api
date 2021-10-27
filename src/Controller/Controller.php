<?php

namespace GroupLife\Api\Controller;

use Doctrine\DBAL\Connection;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

abstract class Controller
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    abstract public function get(Request $request, Response $response);

    abstract public function post(Request $request, Response $response);
}
