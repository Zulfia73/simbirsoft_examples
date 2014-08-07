<?php

interface LoggerInterface
{
	/**
	 * @param string $message
	 */
    public function info($message);

	/**
	 * @param string $message
	 */
    public function warn($message);

    /**
	 * @param string $message
	 */
    public function error($message);

    /**
     * @param string $level
	 * @param string $message
	 */
    public function log($level, $message);
}

class Logger implements LoggerInterface
{
	private $fd = null;

	public function __construct($filename) {
		$this->fd = fopen($filename, 'w+b');
	}

    public function info($message)
    {
        $this->log('info', $message);
    }

    public function warn($message)
    {
        $this->log('warning', $message);
    }

    public function error($message)
    {
        $this->log('error', $message);
    }

    public function log($level, $message)
    {
        fwrite($this->fd, '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ': ' . $message . "\n");
    }
}

//test

$logger = new Logger('./my.log');
$logger->info("Каждый день следует прочитать хоть какое-нибудь мудрое изречение.");
