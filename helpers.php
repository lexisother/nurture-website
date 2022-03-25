<?php

use Extersia\Filesystem\Filesystem;
use Extersia\View\FileViewFinder;

// TODO: Make a proper app class with config
/**
 * The main App class, the one who oversees all.
 */
class App
{
  /**
   * @var \Extersia\Filesystem\Filesystem
   */
  private static $files;

  /**
   * @var \Extersia\View\FileViewFinder
   */
  private static $viewFinder;

  /**
   * Return the App's Filesystem instance.
   *
   * @return \Extersia\Filesystem\Filesystem
   */
  public static function getFiles()
  {
    return self::$files;
  }

  /**
   * Return the App's FileViewFinder instance.
   *
   * @return \Extersia\View\FileViewFinder
   */
  public static function getViewFinder()
  {
    return self::$viewFinder;
  }

  /**
   * Initialize the App.
   */
  public static function initialize()
  {
    self::$files = new Filesystem;
    self::$viewFinder = new FileViewFinder(self::$files, [__DIR__ . '/views']);
  }
}

App::initialize();

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
