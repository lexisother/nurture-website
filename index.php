<?php
# Load Composer
require __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$router = new Router();

foreach (['home', 'tour', 'songs', 'aboutme'] as $route) {
  $routename = $route;
  $viewname = $route;
  if ($route == 'home') {
    $routename = "";
    $viewname = "home";
  }

  $router->get("/{$routename}", function () use ($viewname) {
    view($viewname);
  });
}

$router->run();
