<?php

use TCCP\Application;
use TCCP\ServiceContainer;
use TCCP\Plugins\RoutePlugin;
use TCCP\Plugins\ViewPlugin;
use TCCP\Plugins\DbPlugin;
use TCCP\View\ViewRendererInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\RequestInterface;
use TCCP\Models\CategoryCost;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("responser com emitter do diactoros");
    return $response;
});

$app
    ->get('/category-costs', function() use($app){
        $meuModel = new CategoryCost();
        $categories = $meuModel->all();
        $view = $app->service('view.renderer');
        return $view->render('category-costs/list.html.twig',[
            'categories' => $categories
        ]);
    })
    ->get('/category-costs/new', function() use($app){
        $view = $app->service('view.renderer');
        return $view->render('category-costs/create.html.twig');
    })
    ->post('/category-costs/store', function(ServerRequestInterface $request){
        $data = $request->getParsedBody();
        TCCP\Models\CategoryCost::create($data);
        return new \Zend\Diactoros\Response\RedirectResponse('/category-costs');
    });


$app->start();
?>