<?php
require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\Slug\SlugUrl;

$slugUrl = new SlugUrl();
$slugUrl->setSiteUrl('https://nguyenanhung.com')->setSiteExt('.html');

$name = 'Nguyễn An Hưng';

echo "slugify: " . $slugUrl->slugify($name) . PHP_EOL;
echo "searchSlugify: " . $slugUrl->searchSlugify($name) . PHP_EOL;
echo "toEnglish: " . $slugUrl->toEnglish($name) . PHP_EOL;
echo "convertVietnameseToEnglish: " . $slugUrl->convertVietnameseToEnglish($name) . PHP_EOL;
