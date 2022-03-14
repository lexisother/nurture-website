<?php
# Load Composer
require __DIR__ . '/vendor/autoload.php';

use Bramus\Router\Router;
# https://packagist.org/packages/knplabs/github-api
# https://packagist.org/packages/league/commonmark

// includeWithVariables {{{
// <https://stackoverflow.com/a/45563622>
$GLOBALS["includeWithVariables"] = function ($filePath, $variables = array(), $print = true) {
  $output = NULL;
  if (file_exists($filePath)) {
    // Extract the variables to a local namespace
    extract($variables);

    // Start output buffering
    ob_start();

    // Include the template file
    include $filePath;

    // End buffering and return its contents
    $output = ob_get_clean();
  }
  if ($print) {
    print $output;
  }
  return $output;
};
// }}}

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
    $GLOBALS['includeWithVariables']('pages/posts.php', ['posts' => $posts]);
  });

  foreach ($posts as $post) {
    $title = $post['meta']['title'];
    $router->get("/{$title}", function () use ($post) {
      $GLOBALS['includeWithVariables']('pages/post.php', ['postData' => $post]);
    });
  }
});


$router->run();
