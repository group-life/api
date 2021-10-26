<?php

use GroupLife\Api\Controller\TestController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = \DI\Bridge\Slim\Bridge::create(require realpath(__DIR__ . '/../config/container.php'));

$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/test', [TestController::class, 'test']);

return $app;
