<?php
includeWithVariables('templates/base.php', ['pageTitle' => "{$songMeta->name} | Songs"]);
?>

<div class="container">
  <div class="song-header">
    <div class="song-meta">
      <div class="song-meta-title"><?= $songMeta->name ?></div>
      <div class="song-meta-desc">test</div>
    </div>

    <div class="song-data">
      <div class="song-data-item">
        <div class="song-data-item-header">Artist</div>
        <div class="song-data-item-content"><?= $songMeta->artists[0]->name ?></div>
      </div>
    </div>
  </div>
</div>
