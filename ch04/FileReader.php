<?php

/**
 * Класс реализующий функционал чтения
 * файла, имплементит интерфейс итератора
 */
class FileReader implements Iterator
{
    /**
     * Дескриптор файла
     *
     * @var resource
     */
    protected $handler;

    /**
     * Индекс текущей строки
     *
     * @var int
     */
    protected $index = 0;

    /**
     * Конструктор
     *
     * Открывает файл для чтения
     *
     * @param string $file
     */
    public function __construct($file)
    {
        $this->handler = fopen($file, 'r');
    }

    /**
     * Возвращает текущую строку
     *
     * @return string
     */
    public function current()
    {
        return fgets($this->handler);
    }

    /**
     * Возвращает индекс текущей строки
     *
     * @return int
     */
    public function key()
    {
        return $this->index;
    }

    /**
     * Передвинуть указатель на следующую строку
     *
     * @return void
     */
    public function next()
    {
        $this->index++;
    }

    /**
     * Сбрасывает указатель
     *
     * @return void
     */
    public function rewind()
    {
        rewind($this->handler);

        $this->index = 0;
    }

    /**
     * Проверка факта наличия текущей строки
     *
     * @return bool
     */
    public function valid()
    {
        return !feof($this->handler);
    }
}

// test

foreach (new FileReader('./for_read.txt') as $line) {
    echo $line;
}
