<?php

use Extersia\Filesystem\Filesystem;
use Extersia\View\FileViewFinder;

// TODO: Make a proper app class with config
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

  public static function getFiles()
  {
    return self::$files;
  }

  public static function getViewFinder()
  {
    return self::$viewFinder;
  }

  public static function initialize()
  {
    self::$files = new Filesystem;
    self::$viewFinder = new FileViewFinder(self::$files, [__DIR__ . '/views']);
  }
}

App::initialize();

// TODO: Make it `view`. Have it read through a `views` folder, yadda yadda.
// <https://laravel.com/api/8.x/[Global_Namespace].html#function_view>
// <https://github.com/laravel/framework/blob/8.x/src/Illuminate/Foundation/helpers.php#L924>
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
 * @param App $app The app.
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
