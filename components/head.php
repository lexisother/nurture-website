<?php
// SCSS stuff
use ScssPhp\ScssPhp\Compiler;

$compiler = new Compiler();
$compiler->setImportPaths(__DIR__ . '/../scss/');
$res = "";

foreach (new DirectoryIterator(__DIR__ . '/../scss') as $file) {
  if ($file->isDot()) continue;
  $content = file_get_contents($file->getRealPath());
  $res .= $compiler->compileString($content)->getCss();
}
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

  <style>
    <?php echo $res; ?>
  </style>
</head>
