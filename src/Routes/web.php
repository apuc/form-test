<?php

$this->router->get('/', ['App\Controllers\MainController', 'actionIndex']);
$this->router->get('/show-city', ['App\Controllers\ShowController', 'actionShowCity']);
$this->router->get('/show-request', ['App\Controllers\ShowController', 'actionShowAllRequest']);
$this->router->get('/error', ['App\Controllers\ErrorController', 'actionError']);
$this->router->post('/form-request/submit', ['App\Controllers\ApiController', 'actionSubmit']);
