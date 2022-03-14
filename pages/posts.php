<?php
$GLOBALS['includeWithVariables'](__DIR__ . '/../templates/base.php', ['pageTitle' => "Posts"]);

foreach ($posts as $post) {
?>
  <div class="posts-page">
    <div class="list-item">
      <div class="name"><?= $post['meta']['title'] ?></div>
      <div class="description"></div>
    </div>
  </div>
<?php
}
?>
