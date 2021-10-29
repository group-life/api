<?php

namespace GroupLife\Api\Tests\integration\Controller;

use GroupLife\Api\Test\ApplicationTestCase;
use function GroupLife\Api\database;

class LeaderControllerTest extends ApplicationTestCase
{
    public function testGet()
    {
        database()->insert('leader', ['name' => 'Ivan', 'surname' => 'Ivanov']);
        $response = $this->app->handle($this->createRequest('GET', '/leaders/1'));

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('{"id":1,"name":"Ivan","surname":"Ivanov"}', (string)$response->getBody());
    }
}
