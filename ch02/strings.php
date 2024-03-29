<?php

$str = 'Текстовая строка';
$substr = 'сто';
$encoding = 'utf-8';

/////////////////////////////////////////////////////////////////////////////// 1

echo "Длина: ".mb_strlen($str, $encoding).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 2

echo PHP_EOL."Подстрока (1, 3): ".mb_substr($str, 1, 3, $encoding).PHP_EOL;
echo "Подстрока (-10, 3): ".mb_substr($str, -10, 3, $encoding).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 3

echo PHP_EOL."Позиция подстроки (\"{$substr}\"): ".mb_strpos($str, $substr, null, $encoding).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 4

echo PHP_EOL."Разбиение на массив по пробелу:".PHP_EOL;

var_dump(
	$arr = explode(' ', $str)
);

/////////////////////////////////////////////////////////////////////////////// 5

$istr = implode(' ', $arr);
echo PHP_EOL."Склейка массива по пробелу: {$istr}".PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 6

echo PHP_EOL."Вывод управляющих символов:".PHP_EOL;
echo "a\rb\nc\td".PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 7

echo PHP_EOL."Форматирование консольного вывода:".PHP_EOL;
printf("[%38s]\n", $str);
