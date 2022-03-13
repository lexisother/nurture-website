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
