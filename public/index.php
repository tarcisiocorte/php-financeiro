<?php

use TCCP\Application;
use TCCP\Plugins\RoutePlugin;
use TCCP\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/',function(){
    echo "Hello World --- Tarcisio Corte";
});



$app->start();
?>