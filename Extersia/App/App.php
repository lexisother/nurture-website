<?php

namespace Extersia\App;

use Extersia\Filesystem\Filesystem;
use Extersia\View\FileViewFinder;

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
    self::$viewFinder = new FileViewFinder(self::$files, [projectRoot() . '/views']);
  }
}
