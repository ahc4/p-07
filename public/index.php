<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();

//First function: /
$app->get('/', function(Request $request, Response $response, $args)
{
    $response->getBody()->write('Hello world!!');
    return $response;
});

//Second function: /hello/{name}
$app->get('/hello[/{name}]', function(Request $request, Response $response, $args)
{
    $response->getBody()->write('Hello, '.$args['name'].'!!');
    return $response;
});

$app->run();

?>