<?php

require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\Slug\SlugUrl;
use EasySlugger\Utf8Slugger;
use JpnForPhp\Transliterator\Transliterator;

$slugUrl = new SlugUrl();
$slugUrl->setSiteUrl('https://nguyenanhung.com')->setSiteExt('.html');

$name = "訪日旅行の企画・手配業務の求人";


echo "name: " . trim($name) . PHP_EOL;
echo "slugify: " . Utf8Slugger::slugify($name) . PHP_EOL;
echo "slugify: " . $slugUrl->slugify($name) . PHP_EOL;
echo "searchSlugify: " . $slugUrl->searchSlugify($name) . PHP_EOL;
echo "toEnglish: " . $slugUrl->toEnglish($name) . PHP_EOL;
// echo "convertVietnameseToEnglish: " . $slugUrl->convertVietnameseToEnglish($name) . PHP_EOL;

echo "--------Transliterator-----------" . PHP_EOL;

$transliterator = new Transliterator();
$transliterator->setSystem(new \JpnForPhp\Transliterator\System\Hiragana());
echo $transliterator->transliterate($name) . PHP_EOL;
