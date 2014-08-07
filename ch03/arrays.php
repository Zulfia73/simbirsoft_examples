<?php

/////////////////////////////////////////////////////////////////////////////// 1

echo "1. Пример массива:".PHP_EOL;

$arr = array(
	'key1' => "value1",
	'key2' => "value2",
	'key3' => "value3",
);

print_r($arr).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 2

echo PHP_EOL."2. Итерация массива:".PHP_EOL;

foreach ($arr as $key => $value) {
	echo "Шаг итератора, ключ: {$key}, значение: {$value}.".PHP_EOL;
}

/////////////////////////////////////////////////////////////////////////////// 3

echo PHP_EOL."3. Примеры ключей и значений массива:".PHP_EOL;

$arr2 = array(
	'key1',
	234 => "value2",
	null => function(){return;},
	'keyN' => false,
);

print_r($arr2).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 4

echo PHP_EOL."4. Многомерный массив:".PHP_EOL;

$arr3 = array(
	'key1' => "value1",
	'key2' => array(
		'sub_key1' => "sub_value1",
		'sub_key2' => "sub_value2",
	),
	'key3' => "value3",
);

print_r($arr3).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 5

echo PHP_EOL."5. Пересечение массивов:".PHP_EOL;

$arr4 = array(
	'key3' => "value3",
	'key4' => "value4",
	'key5' => "value5",
);

print_r(array_intersect($arr, $arr4)).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 6

echo PHP_EOL."6. Объединение массивов:".PHP_EOL;

print_r($arr3 + $arr4).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 7

echo PHP_EOL."7. Фильтрация массива:".PHP_EOL;

print_r(array_filter($arr2, function ($value) {
	return !empty($value);
}));

/////////////////////////////////////////////////////////////////////////////// 8

echo PHP_EOL."8. Применение одной операции ко всем элементам массива:".PHP_EOL;

print_r(array_map(function ($value) {
	return $value . '_mark';
}, $arr4));

/////////////////////////////////////////////////////////////////////////////// 9

echo PHP_EOL."9. Применение одной операции ко всем элементам массива:".PHP_EOL;

print_r(array_map(function ($value) {
	return $value . '_mark';
}, $arr4));

/////////////////////////////////////////////////////////////////////////////// 10

echo PHP_EOL."10. Сортировка массива по ключам и по значениям:".PHP_EOL;

$arr5 = array(
	'key3' => "value1",
	'key2' => "value2",
	'key1' => "value3",
);

ksort($arr5); print_r($arr5).PHP_EOL; // По ключу
arsort($arr5); print_r($arr5).PHP_EOL; // По значению

/////////////////////////////////////////////////////////////////////////////// 11

echo PHP_EOL."11. Сортировка многомерного массива:".PHP_EOL;

$arr6 = array(
	'one' => array(
		5,
		2,
		1
	),
	'two' => array(
		1,
		3,
		7
	),
);

array_multisort($arr6[1], SORT_ASC, SORT_NUMERIC,
                $arr6[2], SORT_NUMERIC, SORT_DESC);


print_r($arr6).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 12

echo PHP_EOL."12. Своя сортировка:".PHP_EOL;

usort($arr5, function ($a, $b) {
	if ($a == $b) {
        return 0;
    }

    return ($a > $b) ? -1 : 1;
});

print_r($arr5).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 13

echo PHP_EOL."13. Подсчет элементов в массиве:".PHP_EOL;

echo count($arr5).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 14

echo PHP_EOL."14. Сериализация массива:".PHP_EOL;

echo serialize($arr5).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 15

echo PHP_EOL."15. Получение массива ключей:".PHP_EOL;

print_r(array_keys($arr5)).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 16

echo PHP_EOL."16. Получение массива значений:".PHP_EOL;

print_r(array_values($arr5)).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 17

echo PHP_EOL."17. std-массивы:".PHP_EOL;

$std = new stdClass;
$std->uno = 'value 1';
print_r($std).PHP_EOL;

$std = (array)$std;
$std['dos'] = 'value 2';
print_r($std).PHP_EOL;

$std = (object)$std;
$std->tres = 'value 3';
print_r($std).PHP_EOL;
