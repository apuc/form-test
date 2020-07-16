<?php


use App\Models\Database;
use Phroute\Phroute\RouteCollector;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'].'/');

Database::getInstance();
$router = new RouteCollector();
require_once ROOT_DIR.'src/Routes/web.php';
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo $response;