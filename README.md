<p align="center">
    <img
        alt="Google photos logo" 
        src="https://i.imgur.com/z3wkiiQ.png"
        width="100" />
</p>
<p align="center">
    <a href="https://packagist.org/packages/lefuturiste/google-photos-album-crawler">
        <img
            alt="Latest Stable Version"
            src="https://poser.pugx.org/lefuturiste/google-photos-album-crawler/v/stable" />
    </a>
    <a href="https://packagist.org/packages/lefuturiste/google-photos-album-crawler">
        <img
            alt="Total Downloads"
            src="https://poser.pugx.org/lefuturiste/google-photos-album-crawler/downloads" />
    </a>
    <a href="https://packagist.org/packages/lefuturiste/google-photos-album-crawler">
        <img
            alt="License"
            src="https://poser.pugx.org/lefuturiste/google-photos-album-crawler/license" />
    </a>
</p>

# PHP Google photos album crawler

Just a little and light script to fetch an album name, images from a public google photos album url. This simple script will simply use guzzle to get the html of the page, apply a regex to get the JSON data, then parse it. For big album it might take a little bit of time so be patient and make sure to not block the main thread of your application. You can for example use this script in a async task or a job queue.
Enjoy! 

## Requirements & dependencies

- php7.1 or newer
- ext-curl
- guzzlehttp/guzzle

## Installation

`composer require lefuturiste/google-photos-album-crawler`

## Usage

Be sure to use a public google photos sharing URL with the correct format.

Use the Crawler class inside the right namespace and call the method `getAlbum` after instantiating the class.

This method return the following format:

- `id`: id of the album
- `name`: name of the album
- `images[]`:
    - `id`: id of the image
    - `url`: the base url to download the image
    - `width`: the max width of the image
    - `height`: the max height of the image 

```php
<?php
require 'vendor/autoload.php';

$url = "https://photos.google.com/share/XXX?key=XXX";

$crawler = new \Lefuturiste\GooglePhotosAlbumCrawler\Crawler();

$album = $crawler->getAlbum($url);

echo "Album: " . $album['id'] . " " . $album['name'] . "\n";
echo "Contain: " . count($album['images']) . " images \n\n";

foreach ($album['images'] as $image) {
    echo "- " . $image['id'] . " " . $image['width'] . "x" . $image['height']  . " " . $image['url'] . "\n";
}

```

For a simple in a file example see: [example.php](https://github.com/lefuturiste/google-photos-album-crawler)

## Contributing

Any issues of suggetion, this is a open source project so you can use github Issues and PR.
Also feel free to contact me on [twitter](https://twitter.com/_le_futuriste) if you want a quick answer because I don't notice the github notifications... 