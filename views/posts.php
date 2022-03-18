<?php
includeWithVariables(__DIR__ . '/../templates/base.php', ['pageTitle' => "Posts"]);
$title = "Posts";
$description = "A list of all my blog posts.";
?>
<div class="posts-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
    <div class="desc"><?= $description ?></div>
  </div>

  <?php
  foreach ($posts as $post) {
  ?>
    <div class="list-item">
      <div class="name"><a href="/posts/<?= $post['meta']['title'] ?>"><?= $post['meta']['title'] ?></a></div>
      <div class="description"></div>
    </div>
  <?php
  }
  ?>
</div>
