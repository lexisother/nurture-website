<?php

// ...really? *Seriously?*
// <https://github.com/KnpLabs/php-github-api/issues/1057>
function getUserRepositories($client, $username, $options)
{
  return $client->get('/users/' . rawurlencode($username) . '/repos', $options);
}
