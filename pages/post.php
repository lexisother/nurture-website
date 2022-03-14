<?php
$GLOBALS['includeWithVariables'](__DIR__ . '/../templates/base.php', ['pageTitle' => "Post \"{$postData['meta']['title']}\""]);

echo $postData['html'];
