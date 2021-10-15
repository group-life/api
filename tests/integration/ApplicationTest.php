<?php

namespace GroupLife\Api\Tests\integration;

use GroupLife\Api\Test\ApplicationTestCase;

class ApplicationTest extends ApplicationTestCase
{
    public function testRespondsWithHelloWorld(): void
    {
        $response = $this->app->handle($this->createRequest('GET', '/'));

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('Hello world!', (string)$response->getBody());
    }
}
