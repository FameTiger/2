<?php

require '../vendor//autoload.php';
$connector = new Components\Orm\Connector;
var_export($connector->connect());
$router = new Core\Router;
$router->run();
