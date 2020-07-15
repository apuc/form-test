<?php

$router->get('/', ['App\Controllers\MainController', 'actionIndex']);
$router->get('/show-city', ['App\Controllers\ShowController', 'actionShowCity']);
$router->get('/show-request', ['App\Controllers\ShowController', 'actionShowAllRequest']);
$router->get('/error', ['App\Controllers\ErrorController', 'actionError']);
$router->post('/form-request/submit', ['App\Controllers\ApiController', 'actionSubmit']);