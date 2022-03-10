<?php
# Load Composer
require __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
# https://packagist.org/packages/knplabs/github-api
# https://packagist.org/packages/league/commonmark

$router = new Router();

$router->get('/', function () {
  include 'home.php';
});

$router->run();
