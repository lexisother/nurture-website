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

foreach (range(1, 3) as $i) {
  $router->get("/{$i}", function () use ($i) {
    include __DIR__ . '/components/head.php';
    include __DIR__ . '/components/header.php';
    print $i;
  });
}

$router->run();
