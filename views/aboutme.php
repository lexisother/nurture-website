<?php
includeWithVariables('templates/base.php', ['pageTitle' => "About Me"]);
$title = "About Me";
$description = "";

// Calculate the difference in years between my birth date and the current
// date.
$bdate = new DateTime('2005-11-28');
$new = new DateTime();
$diff = $new->diff($bdate)->y;
?>

<div class="aboutme-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
  </div>

  <div>
    <?= str_replace('{{age}}', $diff, trans('aboutme.content')) ?>
  </div>
</div>

<div class="include-media-test"></div>

<style>
  .aboutme-page>div>p>img {
    display: inline-block;
    vertical-align: middle;
    height: 24px;
  }
</style>
