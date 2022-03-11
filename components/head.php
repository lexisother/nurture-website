<?php

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

<head>
  <style>
    <?php echo $res; ?>
  </style>
</head>
