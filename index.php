<?php
# Load Composer
require __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
# https://packagist.org/packages/knplabs/github-api
# https://packagist.org/packages/league/commonmark

// You know, I was thinking of going completely overboard and writing my own
// controller-structure using classes.
// Maybe I should. I probably shouldn't. But I could.

// TODO" Maybe write my own. Although, this looks a lot like old Ignition and
// that makes me happy.
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$router = new Router();
$posts = include 'markdown.php';

$router->get('/', function () {
  include 'pages/home.php';
});

$router->get('/projects', function () {
  include 'pages/projects.php';
});

$router->mount('/posts', function () use ($router, $posts) {
  $router->get('/', function () use ($posts) {
    includeWithVariables('pages/posts.php', ['posts' => $posts]);
  });

  foreach ($posts as $post) {
    $title = $post['meta']['title'];
    $router->get("/{$title}", function () use ($post) {
      includeWithVariables('pages/post.php', ['postData' => $post]);
    });
  }
});


$router->run();
