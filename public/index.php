<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
use core\Router;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'core/functions.php';
require base_path('vendor/autoload.php');

$router = new Router();
require base_path('app/config/routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
