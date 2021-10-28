<?php

namespace GroupLife\Api\Controller;

use GroupLife\Core\DataMapper\LeaderMapper;
use GroupLife\Core\Leader;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class LeaderController
{
    private $leaderMapper;

    public function __construct(LeaderMapper $leaderMapper)
    {
        $this->leaderMapper = $leaderMapper;
    }

    public function get(Request $request, Response $response)
    {
        $id = $request->getAttribute('id');
        $leader = $this->leaderMapper->find($id);
        $response->getBody()->write(json_encode($leader));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function post(Request $request, Response $response)
    {
        $name = $request->getParsedBody()['name'];
        $surname = $request->getParsedBody()['surname'];
        $leader = new Leader($name, $surname);
        $this->leaderMapper->insert($leader);
        $response->getBody()->write(
            'New leader ' . $name . ' ' . $surname . ' has added with id - ' . getDataObject($leader)->id
        );
        return $response;
    }
}
