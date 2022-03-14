<?php

use Github\AuthMethod;
use Github\Client;

$GLOBALS['includeWithVariables'](__DIR__ . '/../templates/base.php', ['pageTitle' => 'Projects']);
include __DIR__ . '/../config.inc.php';

// TODO: Add caching https://github.com/php-cache/filesystem-adapter
// see https://packagist.org/packages/knplabs/github-api for info

$client = new Client();
$client->authenticate($CONFIG['github_token'], AuthMethod::ACCESS_TOKEN);

// Array containing repositories, see <https://docs.github.com/en/rest/reference/repos#list-repositories-for-a-user>
$repositories = $client->api('user')->repositories('lexisother');

// Sort the repositories by their `updated_at` date, latest first
usort($repositories, function ($a, $b) {
  $date1 = strtotime($a['updated_at']);
  $date2 = strtotime($b['updated_at']);
  return $date2 - $date1;
});
?>

<table>
  <tr>
    <th>Name</th>
  </tr>
  <?php
  foreach ($repositories as $repo) {
  ?>
    <tr>
      <td><a href="<?= $repo['html_url'] ?>"><?= $repo['name'] ?></a></td>
    </tr>
  <?php
  }
  ?>
</table>
