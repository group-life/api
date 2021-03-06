<?php

use GroupLife\Api\Controller\LeaderController;
use GroupLife\Api\Controller\TestController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

AppFactory::setContainer(require realpath(__DIR__ . '/../config/container.php'));

$app = AppFactory::create();
$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);
$app->addBodyParsingMiddleware();

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->get('/test', [TestController::class, 'test']);

$app->get('/leaders/{id}', [LeaderController::class, 'get']);

$app->post('/leaders', [LeaderController::class, 'post']);

$app->put('/leaders/{id}', [LeaderController::class, 'put']);

$app->delete('/leaders/{id}', [LeaderController::class, 'delete']);

return $app;
