<?php
require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\Slug\SlugUrl;

$slugUrl = new SlugUrl();
$slugUrl->setSiteUrl('https://nguyenanhung.com')->setSiteExt('.html');

$name = 'Nguyễn An Hưng';

echo "slugify: " . $slugUrl->slugify($name) . PHP_EOL;
echo "searchSlugify: " . $slugUrl->searchSlugify($name) . PHP_EOL;
echo "strToEn: " . $slugUrl->strToEn($name) . PHP_EOL;
