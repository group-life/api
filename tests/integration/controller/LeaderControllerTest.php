<?php

namespace GroupLife\Api\Tests\integration\Controller;

use GroupLife\Api\Test\ApplicationTestCase;
use function GroupLife\Api\database;

class LeaderControllerTest extends ApplicationTestCase
{
    public function testPost()
    {
        $content = '{"name": "Petya","surname": "Vasin"}';
        $request = $this->createRequest("POST", "/leaders", $content, '', ['Content-Type' => 'application/json']);
        $response = $this->app->handle($request);
        self::assertSame(200, $response->getStatusCode());
    }

    public function testGet()
    {
        $response = $this->app->handle($this->createRequest('GET', '/leaders/1'));

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('{"id":1,"name":"Petya","surname":"Vasin"}', (string)$response->getBody());
    }

    public function testPut()
    {
        $content = '{"name": "Vasya","surname": "Petin"}';
        $request = $this->createRequest("PUT", "/leaders/1", $content, '', ['Content-Type' => 'application/json']);
        $response = $this->app->handle($request);
        self::assertSame(200, $response->getStatusCode());
        self::assertSame('Leader Vasya Petin with id - 1 has been updated', (string)$response->getBody());
    }

    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function testDelete()
    {
        $request = $this->createRequest("DELETE", "/leaders/1");
        $response = $this->app->handle($request);
        self::assertSame(200, $response->getStatusCode());
        self::assertSame('Leader with id - 1 has been deleted', (string)$response->getBody());
        database()->insert('leader', ['id' => '1', 'name' => 'Petya', 'surname' => 'Vasin']);

    }
}

