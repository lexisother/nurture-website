<?php

use Github\AuthMethod;
use Github\Client;

include 'config.inc.php';

// TODO: Add caching https://github.com/php-cache/filesystem-adapter
// see https://packagist.org/packages/knplabs/github-api for info

$client = new Client();
$client->authenticate($CONFIG['github_token'], AuthMethod::ACCESS_TOKEN);

$repositories = $client->api('user')->repositories('lexisother');

foreach ($repositories as $repo) {
  echo $repo['name'] . '<br>';
}
