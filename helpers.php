<?php

use Extersia\App\App;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;

App::initialize();

if (!isset($_COOKIE['language'])) {
  setcookie("language", "en", 2147483647);
}
if (isset($_POST['nl']) || isset($_POST['en'])) {
  if (isset($_POST['en'])) {
    setcookie("language", "en", 2147483647);
    header("Refresh: 0; url={$_SERVER['REQUEST_URI']}");
  }
  if (isset($_POST['nl'])) {
    setcookie("language", "nl", 2147483647);
    header("Refresh: 0; url={$_SERVER['REQUEST_URI']}");
  }
}

function trans(string $text)
{
  $translator = new Translator('en');
  if (isset($_COOKIE['language'])) {
    $_COOKIE['language'] == 'nl'
      ? $translator->setLocale('nl')
      : "";
  }
  $translator->addLoader('yml', new YamlFileLoader());
  $translator->addResource('yml', __DIR__ . '/translations/messages.yml', 'en');
  $translator->addResource('yml', __DIR__ . '/translations/messages.nl.yml', 'nl');
  return $translator->trans($text);
}

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
