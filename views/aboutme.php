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
    <p>
      Hi! I'm Alyxia! I'm a <?= $diff ?> y/o trans <img src="https://twemoji.maxcdn.com/v/latest/svg/1f3f3-fe0f-200d-26a7-fe0f.svg" /> hobbyist software developer based in the
      Netherlands.
    </p>

    <p>
      Most of my work is in TypeScript, though I've been picking up PHP. I'm mostly interested in Discord
      bot development / client modifications, and web applications.
    </p>

    <p>
      Aside from software development, I'm also into composing music, playing the piano and the guitar.
    </p>

    <p>
      Wanna chat? There's a couple ways to contact me!<br>
      You can email me: alyxia at riseup dot net<br>
      or directly message me: Alyxia on Revolt (preferably), Alyxia#4650 on Discord
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
