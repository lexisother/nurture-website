<?php

use ScssPhp\ScssPhp\Compiler;

// Create a new instance of the SCSS compiler
$compiler = new Compiler();
$compiler->setImportPaths(__DIR__ . '/../scss/'); // Make sure `@import` statements don't break

$res = "";
$index = "";

// Loop over every file in our SCSS directory,
foreach (new DirectoryIterator(__DIR__ . '/../scss') as $file) {
  // Does the filename start with a dot? Skip it.
  if ($file->isDot()) continue;

  // Get the file contents, compile it, and push it to the appropriate string.
  $content = file_get_contents($file->getRealPath());
  if ($file->getBasename() == "index.scss") {
    $index .= $compiler->compileString($content)->getCss();
  } else {
    $res .= $compiler->compileString($content)->getCss();
  }
}

// Merge the index file with all the others.
$res = $index . $res;
?>


<?php
// Contains the $CONFIG array
include __DIR__ . '/../config.inc.php';

$title = $pageTitle ? "{$pageTitle} | {$CONFIG['site_name']}" : $CONFIG['site_name'];
?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $title ?></title>

  <meta name="description" content="<?= $CONFIG['description'] ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:description" content="<?= $CONFIG['description'] ?>" />

  <meta name="twitter:title" content="<?= $title ?>" />
  <meta name="twitter:site" content="@lexisother" />
  <meta name="twitter:creator" content="@lexisother" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="<?= $CONFIG['description'] ?>" />

  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
    <?php echo $res; ?>
  </style>
</head>
