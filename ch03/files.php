<?php

/////////////////////////////////////////////////////////////////////////////// 1

echo "1. Чтение файла:".PHP_EOL;

echo file_get_contents('for_read.txt', 'r');

/////////////////////////////////////////////////////////////////////////////// 2

echo PHP_EOL."2. Запись файла:".PHP_EOL;

$writed = file_put_contents('for_write.txt', "Грузите апельсины бочками!" . PHP_EOL);

echo "Записано {$writed} байт".PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 3

echo PHP_EOL."3. Последовательный проход по файлу:".PHP_EOL;

$fd = fopen('for_read.txt', 'r');

fseek($fd, 92);

while ($str = fgets($fd)) {
    echo $str;
}

fclose($fd);

/////////////////////////////////////////////////////////////////////////////// 4

echo PHP_EOL."4. Последовательная запись в файл:".PHP_EOL;

$fd = fopen('for_write.txt', 'w');

$arr = array(
    "Грузите апельсины бочками",
    "Пилите, Шура, пилите, она - золотая"
);

$writed = 0;
foreach ($arr as $str) {
    $writed += fwrite($fd, $str.PHP_EOL);
}

echo "Записано {$writed} байт".PHP_EOL;

fclose($fd);

/////////////////////////////////////////////////////////////////////////////// 5

echo PHP_EOL."5. Бинарный доступ:".PHP_EOL;

$bin_filename = "logo.png";

$fd = fopen($bin_filename, 'rb');

$bin_data = fread($fd, 16);

echo chunk_split(bin2hex($bin_data), 2, " ").PHP_EOL;

fclose($fd);

/////////////////////////////////////////////////////////////////////////////// 6

echo PHP_EOL."6. Добавление в конец файла:".PHP_EOL;

$fd = fopen('for_write.txt', 'a+');

$writed += fwrite($fd, "Огласите весь список, пожалуйста!".PHP_EOL);

echo "Дописано {$writed} байт".PHP_EOL;

fclose($fd);

/////////////////////////////////////////////////////////////////////////////// 7

echo PHP_EOL."7. Получение информации о файле:".PHP_EOL;

$filename = 'for_write.txt';
$filesize = filesize($filename);
$filemtime = filemtime($filename);
$fileperms = fileperms($filename);

echo "Файл: {$filename}".PHP_EOL.
    "Размер: {$filesize} байт".PHP_EOL.
    "Изменен: ".date("d.m.Y H:i:s", $filemtime).PHP_EOL.
    "Права доступа: ".substr(sprintf('%o', $fileperms), -3).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 8

echo PHP_EOL."8. Работа с директориями:".PHP_EOL;

$dstruct = './mydir/subdir';

echo "Создаем структуру директорий {$dstruct}".PHP_EOL;

if (!is_dir($dstruct))
    mkdir($dstruct, 0700, true);

echo "Отображаем текущую директорию:".PHP_EOL;

if ($dh = opendir('.')) {
    while (($cur = readdir($dh)) !== false) {
        if ($cur != '.' and $cur != '..') {
            echo ' '.(filetype($cur) == 'file' ? 'Файл' : 'Директория') . " {$cur}\n";
        }
    }
    closedir($dh);
}

echo "Удаляем крайнюю директорию в пути {$dstruct}".PHP_EOL;

if (is_dir($dstruct))
    rmdir($dstruct);

$onemore = './onemoredir';

if (!is_dir($dstruct))
    mkdir($dstruct, 0755);

/////////////////////////////////////////////////////////////////////////////// 9

echo PHP_EOL."9. Права доступа:".PHP_EOL;

$myfile = './myfile.txt';

touch($myfile);

chmod($myfile, 0777);
//chown($myfile, 'username');  // rights
//chgrp($myfile, 'groupname'); //

echo "Файл {$myfile}".PHP_EOL;
echo "Права доступа к файлу: " . substr(sprintf('%o', fileperms($myfile)), -3).PHP_EOL;
echo "Владелец файла (uid): " . fileowner($myfile).PHP_EOL;
echo "Группа файла (gid): " . filegroup($myfile).PHP_EOL;

/////////////////////////////////////////////////////////////////////////////// 10

echo PHP_EOL."10. Блокирование доступа к файлу:".PHP_EOL;

$myfile = './forlock.txt';

$fd = fopen($myfile, "w+b");

echo "Пробуем заблокировать файл для записи {$myfile}".PHP_EOL;

if (flock($fd, LOCK_EX | LOCK_NB)) {
    echo "Файл заблокирован, теперь снимаем блокировку".PHP_EOL;

    flock($fd, LOCK_UN);

    echo "Блокировка снята".PHP_EOL;
} else {
    echo "Не удалось заблокировать файл".PHP_EOL;
}

fclose($fd);

/////////////////////////////////////////////////////////////////////////////// 11

echo PHP_EOL."11. Считывание в массив строк:".PHP_EOL;

$larr = array_map('rtrim', file('./for_read.txt'));

print_r($larr);

/////////////////////////////////////////////////////////////////////////////// 12

echo PHP_EOL."12. Считывание пословно с заданным разделителем:".PHP_EOL;

$fd = fopen('arr.csv', 'r');

while ($str = fgetcsv($fd)) {
    print_r($str);
}

fclose($fd);
