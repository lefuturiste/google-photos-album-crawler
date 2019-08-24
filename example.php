<?php
require 'vendor/autoload.php';

$url = "https://photos.google.com/share/XXX?key=XXX";

$crawler = new \Lefuturiste\GooglePhotosAlbumCrawler\Crawler();

echo "fetching album...\n";

$album = $crawler->getAlbum($url);

echo "Album: " . $album['id'] . " " . $album['name'] . "\n";
echo "Contain: " . count($album['images']) . " images \n\n";

foreach ($album['images'] as $image) {
    echo "- " . $image['id'] . " " . $image['width'] . "x" . $image['height']  . " " . $image['url'] . "\n";
}

echo "\n";
echo "done.\n";
