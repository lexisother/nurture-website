<?php
# Load Composer
require __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

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

  $router->all("/{$routename}", function () use ($viewname) {
    view($viewname);
  });
}

$router->mount('/songs', function () use ($router) {
  $router->all('/', function () {
    view('songs');
  });

  $file = file_get_contents(__DIR__ . '/assets/songs.json');
  $json = json_decode($file);
  foreach ($json->items as $track) {
    $meta = array_column($json->items, null, 'name')[$track->name];
    $name = strtolower(str_replace(" ", "-", $track->name));

    $router->all("/{$name}", function () use ($meta) {
      view("song", ['songMeta' => $meta]);
    });
  }
});


$router->run();
