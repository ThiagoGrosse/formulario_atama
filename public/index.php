<?php

date_default_timezone_set('America/Sao_Paulo');

session_start();

require '../vendor/autoload.php';
require '../src/routes.php';

$router->run( $router->routes );