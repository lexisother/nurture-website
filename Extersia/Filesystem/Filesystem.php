<?php

namespace Extersia\Filesystem;

/**
 * Filesystem helpers.
 */
class Filesystem
{
  /**
   * Determine if a file or directory exists.
   *
   * @param  string  $path
   * @return bool
   */
  public function exists($path)
  {
    return file_exists($path);
  }
}
