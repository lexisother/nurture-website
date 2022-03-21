<?php
$html = file_get_contents("https://porterrobinson.com");
$document = new DOMDocument();
@$document->loadHTML($html);
$document->preserveWhiteSpace = false;

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
foreach ($json->tour as $item) {
  echo $item->date;
}
