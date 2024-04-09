<?php

require_once __DIR__ . '/../vendor/autoload.php';

use nguyenanhung\Libraries\Slug\SlugUrl;
use EasySlugger\Utf8Slugger;


$slugUrl = new SlugUrl();
$slugUrl->setSiteUrl('https://nguyenanhung.com')->setSiteExt('.html');

$name = "訪日旅行の企画・手配業務の求人";


echo "name: " . trim($name) . PHP_EOL;
echo "slugify: " . Utf8Slugger::slugify($name) . PHP_EOL;
echo "slugify: " . $slugUrl->slugify($name) . PHP_EOL;
echo "searchSlugify: " . $slugUrl->searchSlugify($name) . PHP_EOL;
echo "toEnglish: " . $slugUrl->toEnglish($name) . PHP_EOL;
// echo "convertVietnameseToEnglish: " . $slugUrl->convertVietnameseToEnglish($name) . PHP_EOL;

// Tạo một Transliterator object từ ID của bộ transliteration rules. Ở đây, 'Any-Latin; Latin-ASCII' có nghĩa là chuyển đổi từ bất kỳ bộ ký tự nào sang Latin, sau đó chuyển đổi từ Latin sang ASCII.

// Văn bản đầu vào
$input_text = "こんにちは、世界";

// Thực hiện chuyển đổi văn bản
$output_text = transliterator_transliterate('Any-Latin; Latin-ASCII', $name);

// In kết quả
echo $slugUrl->slugify($output_text); // Output: konnichiwa,-Shi Jie
