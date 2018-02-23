<?php

use TCCP\Application;
use TCCP\Plugins\RoutePlugin;
use TCCP\ServiceContainer;
use TCCP\Plugins\ViewPlugin;
use TCCP\View\ViewRendererInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\RequestInterface;


require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());

$app->get('/', function(ServerRequestInterface $request) use($app){
    $view = $app->service('view.renderer');
    return $view->render('test.html.twig', ['name' => $request->getAttribute('name')]);
});

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("responser com emitter do diactoros");
    return $response;
});

$app->start();
?>