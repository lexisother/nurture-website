<?php
includeWithVariables('templates/base.php', ['pageTitle' => "Home"]);
$title = "Home";
$description = "";
?>

<div class="home-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
  </div>
  <?= trans('home.text') ?>
  <br />
  <p><i>"Everything we need is already here."</i></p>

  <hr />

  <p><?= trans('home.reviewed') ?></p>

</div>
