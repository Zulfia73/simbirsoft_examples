<?php

$source = <<<EOT
Бывает – проснешся, как птица,
Крылатой пружиной на взводе,
И хочется жить и трудиться;
Но к завтраку это проходит.
EOT;

/*
	Convert encoding from UTF-8 to ASCII
*/
$result = mb_convert_encoding($source, 'ascii', 'utf-8');

/*
    Detect encoding
*/
$src_encoding = mb_detect_encoding($source);
$res_encoding = mb_detect_encoding($result);

/*
    String length
*/
$src_len = strlen($source);
$res_len = mb_strlen($result, 'utf-8');

echo "Изначальная кодировка: {$src_encoding} (Длина: {$src_len})".PHP_EOL
   . "Итоговая кодировка: {$res_encoding} (Длина: {$res_len})".PHP_EOL;
