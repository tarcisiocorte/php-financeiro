<?php

use TCCP\Application;
use TCCP\Plugins\AuthPlugin;
use TCCP\Plugins\DbPlugin;
use TCCP\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());
return $app;