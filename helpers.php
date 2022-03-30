<?php

use Extersia\App\App;

App::initialize();

/**
 * Returns the project root.
 *
 * @return string
 */
function projectRoot()
{
  return __DIR__;
}

function includeWithVariables($filePath, $variables = array(), $print = true)
{
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

/**
 * Render a view with the specified options.
 *
 * @param string $viewName The view to render.
 * @param array  $variables Data to pass to the rendered view.
 */
function view($viewName, $variables = array())
{
  $output = NULL;
  $view = App::getViewFinder()->find($viewName);

  // Extract the variables to a local namespace
  extract($variables);

  // Start output buffering
  ob_start();

  // Include the template file
  include $view;

  // End buffering and return its contents
  $output = ob_get_clean();
  print $output;
}
