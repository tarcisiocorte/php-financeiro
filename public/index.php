<?php

use Psr\Http\Message\ServerRequestInterface;
use TCCP\Application;
use TCCP\Plugins\AuthPlugin;
use TCCP\Plugins\DbPlugin;
use TCCP\Plugins\RoutePlugin;
use TCCP\Plugins\ViewPlugin;
use TCCP\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../src/helpers.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/home/{name}/{id}', function (ServerRequestInterface $request) {
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emmiter do diactoros");
    return $response;
});

require_once __DIR__ . '/../src/controllers/statements.php';
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/bill-receives.php';
require_once __DIR__ . '/../src/controllers/bill-pays.php';
require_once __DIR__ . '/../src/controllers/users.php';
require_once __DIR__ . '/../src/controllers/auth.php';



$app->start();