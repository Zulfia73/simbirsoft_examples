<?php

/**
 * Интерфейс логгера
 */
interface LoggerInterface
{
    /**
     * @param string $message Информация
     */
    public function info($message);

    /**
     * @param string $message Предупреждение
     */
    public function warn($message);

    /**
     * @param string $message Ошибка
     */
    public function error($message);

    /**
     * @param string $level Уровень критичности
     * @param string $message Сообщение
     */
    public function log($level, $message);
}

/**
 * Логгер
 */
class Logger implements LoggerInterface
{
    /**
     * Дескриптор файла лога
     *
     * @var null|resource
     */
    private $fd = null;

    /**
     * Конструктор
     *
     * Открывает файл для записи
     *
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->fd = fopen($filename, 'w+b');
    }

    /**
     * {@inheritdoc}
     */
    public function info($message)
    {
        $this->log('info', $message);
    }

    /**
     * {@inheritdoc}
     */
    public function warn($message)
    {
        $this->log('warning', $message);
    }

    /**
     * {@inheritdoc}
     */
    public function error($message)
    {
        $this->log('error', $message);
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message)
    {
        fwrite($this->fd, '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ': ' . $message . "\n");
    }
}

// test

$logger = new Logger('./my.log');
$logger->info("Каждый день следует прочитать хоть какое-нибудь мудрое изречение.");
