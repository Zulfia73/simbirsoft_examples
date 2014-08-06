<?php

$str = 'Текстовая строка';
$substr = 'сто';
$encoding = 'utf-8';

echo "Длина: ".mb_strlen($str, $encoding).PHP_EOL;

echo "Подстрока (1, 3): ".mb_substr($str, 1, 3, $encoding).PHP_EOL;
echo "Подстрока (-10, 3): ".mb_substr($str, -10, 3, $encoding).PHP_EOL;

echo "Позиция подстроки (\"{$substr}\"): ".mb_strpos($str, $substr, null, $encoding).PHP_EOL;

echo "Разбиение на массив по пробелу:".PHP_EOL;

var_dump(
	$arr = explode(' ', $str)
);

$istr = implode(' ', $arr);
echo "Склейка массива по пробелу: {$istr}".PHP_EOL;

echo "Вывод управляющих символов:".PHP_EOL;
echo "a\rb\nc\td".PHP_EOL;

echo "Форматирование консольного вывода:".PHP_EOL;
printf("[%38s]\n", $str);
