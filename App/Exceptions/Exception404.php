<?php

namespace App\Exceptions;

use App\Exceptions\MainException;
use App\Logger;
use Psr\Log\LoggerInterface;
use Throwable;

class Exception404 extends MainException
{
    private $logger;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->setLogger(new Logger());
        $this->logger->error($message . ' exception:' . static::class . ' file:' . $this->file . ' строка:' . $this->line);
    }

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
