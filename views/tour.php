<?php
includeWithVariables(__DIR__ . '/../templates/base.php', ['pageTitle' => 'Tour']);
$title = "Tour";
$description = "This is a list of all planned tour dates, fetched dynamically.";

// Bahaha, this has to be one of the greatest things I've written
$html = file_get_contents("https://porterrobinson.com");
$document = new DOMDocument();
@$document->loadHTML($html);
$document->preserveWhiteSpace = false;

// Fetch the `_DATA_` script tag and extract the JSON...
$data = $document->getElementById('_DATA_');
$json = json_decode($data->childNodes->item(0)->nodeValue);

/*
  Example data:
    {
      "_index": 58,
      "active": true,
      "button": "",
      "date": "2021-11-04T19:00",
      "headline": "Austin",
      "info": "ACL Live",
      "location": "Austin, TX",
      "title": "Austin 2",
      "url": "https://www.ticketmaster.com/event/3A005AA6DB9A3E7D",
      "perma": "austin-2"
    },
 */

// Sort the tour items by their `date`, latest first
usort($json->tour, function ($a, $b) {
  $date1 = strtotime($a->date);
  $date2 = strtotime($b->date);
  return $date1 - $date2;
});

$tourItems = [];
foreach ($json->tour as $item) {
  if ($item->active && strtotime($item->date) > time()) {
    array_push($tourItems, $item);
  }
}
?>

<div class="tour-page">
  <div class="header">
    <div class="title"><?= $title ?></div>
    <div class="desc"><?= $description ?></div>
  </div>
  <?php
  foreach ($tourItems as $item) {
  ?>
    <div class="list-item">
      <div class="name"><?= $item->headline ?></div>
      <!-- <div class="description"><?= $item->location ?> | <?= $item->date ?></div> -->
      <div class="info">
        <div class="label"><?= $item->location ?></div>
        <div class="label"><?= $item->date ?></div>
      </div>
    </div>
    <hr />
  <?php
  }
  ?>
</div>
