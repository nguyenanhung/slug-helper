<?php

require_once __DIR__ . '/../vendor/autoload.php';
$conversionTable = array(
    // Kanji
    '訪' => 'ho',
    '日' => 'nichi',
    '旅' => 'tabi',
    '行' => 'i',
    'の' => 'no',
    '企' => 'ki',
    '画' => 'haku',
    '手' => 'te',
    '配' => 'hai',
    '業' => 'gyo',
    '務' => 'mu',
    '求' => 'kyu',
    '人' => 'jin',
    // Hiragana
    'あ' => 'a',
    'い' => 'i',
    'う' => 'u',
    'え' => 'e',
    'お' => 'o',
    'か' => 'ka',
    'き' => 'ki',
    'く' => 'ku',
    'け' => 'ke',
    'こ' => 'ko',
    'さ' => 'sa',
    'し' => 'shi',
    'す' => 'su',
    'せ' => 'se',
    'そ' => 'so',
    'た' => 'ta',
    'ち' => 'chi',
    'つ' => 'tsu',
    'て' => 'te',
    'と' => 'to',
    'な' => 'na',
    'に' => 'ni',
    'ぬ' => 'nu',
    'ね' => 'ne',
    'は' => 'ha',
    'ひ' => 'hi',
    'ふ' => 'fu',
    'へ' => 'he',
    'ほ' => 'ho',
    'ま' => 'ma',
    'み' => 'mi',
    'む' => 'mu',
    'め' => 'me',
    'も' => 'mo',
    'や' => 'ya',
    'ゆ' => 'yu',
    'よ' => 'yo',
    'ら' => 'ra',
    'り' => 'ri',
    'る' => 'ru',
    'れ' => 're',
    'ろ' => 'ro',
    'わ' => 'wa',
    'を' => 'wo',
    'ん' => 'n',
    // Katakana
    'ア' => 'a',
    'イ' => 'i',
    'ウ' => 'u',
    'エ' => 'e',
    'オ' => 'o',
    'カ' => 'ka',
    'キ' => 'ki',
    'ク' => 'ku',
    'ケ' => 'ke',
    'コ' => 'ko',
    'サ' => 'sa',
    'シ' => 'shi',
    'ス' => 'su',
    'セ' => 'se',
    'ソ' => 'so',
    'タ' => 'ta',
    'チ' => 'chi',
    'ツ' => 'tsu',
    'テ' => 'te',
    'ト' => 'to',
    'ナ' => 'na',
    'ニ' => 'ni',
    'ヌ' => 'nu',
    'ネ' => 'ne',
    'ノ' => 'no',
    'ハ' => 'ha',
    'ヒ' => 'hi',
    'フ' => 'fu',
    'ヘ' => 'he',
    'ホ' => 'ho',
    'マ' => 'ma',
    'ミ' => 'mi',
    'ム' => 'mu',
    'メ' => 'me',
    'モ' => 'mo',
    'ヤ' => 'ya',
    'ユ' => 'yu',
    'ヨ' => 'yo',
    'ラ' => 'ra',
    'リ' => 'ri',
    'ル' => 'ru',
    'レ' => 're',
    'ロ' => 'ro',
    'ワ' => 'wa',
    'ヲ' => 'wo',
    'ン' => 'n'
);

// Văn bản đầu vào
$input_text = "訪日旅行の企画・手配業務の求人";
echo "input text: " . $input_text . PHP_EOL;
// Chuyển đổi từ kanji, hiragana và katakana sang romanji
$output_text = '';
for ($i = 0; $i < mb_strlen($input_text); $i++) {
    $char = mb_substr($input_text, $i, 1);
    if (isset($conversionTable[$char])) {
        $output_text .= $conversionTable[$char];
    } else {
        $output_text .= $char; // Giữ nguyên ký tự nếu không có trong mảng chuyển đổi
    }
}

// In kết quả
echo "output text: " . $output_text . PHP_EOL;
