<?php

use TCCP\Application;
use TCCP\Plugins\RoutePlugin;
use TCCP\ServiceContainer;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\RequestInterface;


require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/',function(RequestInterface $request){
    var_dump($request->getUri());
    die();

    echo "Hello World --- Tarcisio Corte";
});

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("responser com emitter do diactoros");
    return $response;
    
    echo "Mostrando a Home !!";
    echo "<br/>";
    echo $request->getAttribute('name');
    echo "<br/>";
    echo $request->getAttribute('id');

});


$app->start();
?>