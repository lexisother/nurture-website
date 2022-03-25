<?php
// This file does nothing but display the data fed to it.
// In can, in the traditional sense, be called a "component".
includeWithVariables('templates/base.php', ['pageTitle' => "{$songMeta->name} | Songs"]);
?>

<div class="container">
  <div class="song-header">
    <div class="song-meta">
      <div class="song-meta-title"><?= $songMeta->name ?></div>
      <div class="song-meta-desc">
        <?= str_replace("\n", "<br>", $songMeta->description) ?>
        <br />
        <br />
        <iframe width="640" height="420" src="https://www.youtube.com/embed/<?= $songMeta->external_urls->youtube ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="song-data">
      <div class="song-data-item">
        <div class="song-data-item-header">Artist</div>
        <div class="song-data-item-content"><?= $songMeta->artists[0]->name ?></div>
      </div>
      <div class="song-data-item">
        <div class="song-data-item-header">Duration</div>
        <div class="song-data-item-content">
          <?= date("i:s", $songMeta->duration_ms / 1000) ?>
        </div>
      </div>
      <div class="song-data-item">
        <div class="song-data-item-header">Song Preview</div>
        <div class="song-data-item-content">
          <iframe src="https://open.spotify.com/embed/track/<?= $songMeta->id ?>" width="457" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
