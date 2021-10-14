<?php

namespace App\Test\TestCase\Action;

use PHPUnit\Framework\TestCase;

class IndexPageTest extends TestCase
{
    public function testIndexResponse()
    {
        // Mock the repository result
        $this->mock(UserReaderRepository::class)
            ->method('getUserById')->willReturn($user);

        // Create request with method and url
        $request = $this->createRequest('GET', '/users/1');

        // Make request and fetch response
        $response = $this->app->handle($request);

        // Asserts
        $this->assertSame(200, $response->getStatusCode());
        $this->assertJsonData($expected, $response);
    }
}
