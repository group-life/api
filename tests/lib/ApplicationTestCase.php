<?php

namespace GroupLife\Api\Test;

use PHPUnit\Framework\TestCase;
use Slim\App;
use Slim\Psr7\Factory\StreamFactory;
use Slim\Psr7\Headers;
use Slim\Psr7\Request;
use Slim\Psr7\Uri;

abstract class ApplicationTestCase extends TestCase
{
    /**
     * @var App
     */
    protected $app;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app = require __DIR__ . '/../../src/app.php';
    }

    /**
     * @param string $method
     * @param string $path
     * @param string $query
     * @param array $headers
     * @param array $cookies
     * @param array $serverParams
     * @return Request
     */
    protected function createRequest(
        string $method,
        string $path,
        string $query = '',
        array $headers = [],
        array $cookies = [],
        array $serverParams = []
    ): Request {
        $uri = new Uri('', '', 80, $path, $query);

        $handle = fopen('php://temp', 'w+b');
        $stream = (new StreamFactory())->createStreamFromResource($handle);

        $h = new Headers();
        foreach ($headers as $name => $value) {
            $h->addHeader($name, $value);
        }

        return new Request($method, $uri, $h, $cookies, $serverParams, $stream);
    }

}
