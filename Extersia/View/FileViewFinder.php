<?php

namespace Extersia\View;

use Extersia\Filesystem\Filesystem;
use InvalidArgumentException;

class FileViewFinder
{
  /**
   * The filesystem instance.
   *
   * @var \Extersia\Filesystem\Filesystem
   */
  protected $files;

  /**
   * The array of active view paths.
   *
   * @var array
   */
  protected $paths;

  /**
   * The array of views that have been located.
   *
   * @var array
   */
  protected $views = [];

  /**
   * Register a view extension with the finder.
   *
   * @var string[]
   */
  protected $extensions = ['php', 'css', 'html'];

  /**
   * Create a new file view loader instance.
   *
   * @param  \Extersia\Filesystem\Filesystem  $files
   * @param  array  $paths
   * @param  array|null  $extensions
   * @return void
   */
  public function __construct(Filesystem $files, array $paths, array $extensions = null)
  {
    $this->files = $files;
    $this->paths = array_map([$this, 'resolvePath'], $paths);

    if (isset($extensions)) {
      $this->extensions = $extensions;
    }
  }

  /**
   * Get the fully qualified location of the view.
   *
   * @param  string  $name
   * @return string
   */
  public function find($name)
  {
    if (isset($this->views[$name])) {
      return $this->views[$name];
    }

    return $this->views[$name] = $this->findInPaths($name, $this->paths);
  }

  /**
   * Resolve the path.
   *
   * @param  string  $path
   * @return string
   */
  public function resolvePath($path)
  {
    return realpath($path) ?: $path;
  }

  /**
   * Find the given view in the list of paths.
   *
   * @param  string  $name
   * @param  array  $paths
   * @return string
   *
   * @throws \InvalidArgumentException
   */
  public function findInPaths($name, $paths)
  {
    foreach ((array) $paths as $path) {
      foreach ($this->getPossibleViewFiles($name) as $file) {
        if ($this->files->exists($viewPath = $path . '/' . $file)) {
          return $viewPath;
        }
      }
    }

    throw new InvalidArgumentException("View [{$name}] not found.");
  }

  /**
   * Get an array of possible view files.
   *
   * @param  string  $name
   * @return array
   */
  public function getPossibleViewFiles($name)
  {
    return array_map(function ($extension) use ($name) {
      return str_replace('.', '/', $name) . '.' . $extension;
    }, $this->extensions);
  }
}
