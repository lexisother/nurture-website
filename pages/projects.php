<?php

use Github\AuthMethod;
use Github\Client;

$GLOBALS['includeWithVariables'](__DIR__ . '/../templates/base.php', ['pageTitle' => 'Projects']);
include __DIR__ . '/../config.inc.php';

// TODO: Add caching https://github.com/php-cache/filesystem-adapter
// see https://packagist.org/packages/knplabs/github-api for info

$client = new Client();
$client->authenticate($CONFIG['github_token'], AuthMethod::ACCESS_TOKEN);
?>

<table>
  <tr>
    <th>Name</th>
  </tr>
  <?php
  $repositories = $client->api('user')->repositories('lexisother');
  foreach ($repositories as $repo) {
  ?>
    <tr>
      <td><a href="<?= $repo['html_url'] ?>"><?= $repo['name'] ?></a></td>
    </tr>
  <?php
  }
  ?>
</table>
