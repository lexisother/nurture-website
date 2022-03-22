<?php
includeWithVariables('templates/base.php', ['pageTitle' => "Home"]);
$title = "About Me";
$description = "";

$bdate = new DateTime('2005-11-28');
$new = new DateTime();
$diff = $new->diff($bdate)->y;
?>

<div class="aboutme-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
  </div>

  <div>
    <p>
      Hi! I'm Alyxia! I'm a <?= $diff ?> y/o trans <img src="https://twemoji.maxcdn.com/v/latest/svg/1f3f3-fe0f-200d-26a7-fe0f.svg" /> hobbyist software developer based in the
      Netherlands.
    </p>

    <p>
      Most of my work is in TypeScript, though I've been picking up PHP. I'm mostly interested in Discord
      bot development / client modifications, and web applications.
    </p>

    <p>
      Although my work isn't all that professional, aside from software development, I'm also into
      composing music, playing the piano and the guitar.
    </p>
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
