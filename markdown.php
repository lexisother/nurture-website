<?php

use cebe\markdown\Markdown;
use Hyn\Frontmatter\Parser;
use Hyn\Frontmatter\Frontmatters\YamlFrontmatter;

$parser = new Parser(new Markdown);
$parser->setFrontmatter(YamlFrontmatter::class);

$posts = [];

foreach (new DirectoryIterator(__DIR__ . '/blog-posts') as $file) {
  if ($file->isDot()) continue;
  $contents = $parser->parse(file_get_contents($file->getRealPath()));
  array_push($posts, $contents);
}

return $posts;
