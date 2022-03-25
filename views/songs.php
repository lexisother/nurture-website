<?php
includeWithVariables(__DIR__ . '/../templates/base.php', ['pageTitle' => 'Songs']);
$title = "Songs";
$description = "A list of Nurture's songs, fetched from the Spotify API.";

// Fetch the song data from the static file
$file = file_get_contents(__DIR__ . '/../assets/songs.json');
$json = json_decode($file);

// And below, display the data in a grid.
?>

<div class="tour-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
    <div class="desc"><?= $description ?></div>
  </div>
  <div class="grid">
    <?php
    foreach ($json->items as $track) {
      $meta = array_column($json->items, null, 'name')[$track->name];
    ?>
      <div class="gridItem">
        <div class="gridItemHeader">
          <iframe src="https://open.spotify.com/embed/track/<?= $track->id ?>" width="457" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="gridItemText">
          <p><a href="/songs/<?= str_replace(" ", "-", strtolower($track->name)) ?>"><?= $track->name ?></a></p>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>
