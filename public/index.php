<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();

//1st function: '/'
$app->get('/', function(Request $request, Response $response, $args)
{
    $response->getBody()->write('Hello world!!');
    return $response;
});

//2nd function: '/hello/{name}'
$app->get('/hello[/{name}]', function(Request $request, Response $response, $args)
{
    $response->getBody()->write('Hello, '.$args['name'].'!!');
    return $response;
});

//3rd function: '/posttest'
$app->post('/posttest', function(Request $request, Response $response, $args)
{
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost['val1'];
    $val2 = $reqPost['val2'];

    $response->getBody()->write('Values: '.$val1.' & '.$val2);
    return $response;
});

//4th method: '/testjson'
$app->get('/testjson', function(Request $request, Response $response, $args)
{
    $data[0]['Name'] = 'Jonathan';
    $data[0]['LastName'] = 'Guijarro';
    $data[1]['Name'] = 'Joan';
    $data[1]['LastName'] = 'Crisol';
    $data[2]['Name'] = 'Carlos';
    $data[2]['LastName'] = 'Campos';

    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response;
});

$app->run();

?>