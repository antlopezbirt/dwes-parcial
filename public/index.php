<?php

require_once __DIR__ . '/../config/conf.php';
include_once __DIR__ . '/../app/core/Router.php';
include_once __DIR__ . '/../app/controllers/TermostatoController.php';
include_once __DIR__ . '/../app/utils/JsonDataHandler.php';

$url = $_SERVER['REQUEST_URI'];

$router = new Router();

$router->match($url);

?>