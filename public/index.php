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

//Third function: /posttest
$app->post('/posttest', function(Request $request, Response $response, $args)
{
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost['val1'];
    $val2 = $reqPost['val2'];

    $response->getBody()->write('Values: '.$val1.' & '.$val2);
    return $response;
});

$app->run();

?>