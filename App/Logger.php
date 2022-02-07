<?php

namespace App;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\InvalidArgumentException;

class Logger extends LogLevel implements LoggerInterface
{
    public function emergency($message, array $context = [])
    {
        $this->log(static::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = [])
    {
        $this->log(static::ALERT, $message, $context);
    }

    public function critical($message, array $context = [])
    {
        $this->log(static::CRITICAL, $message, $context);
    }

    public function error($message, array $context = [])
    {
        $this->log(static::ERROR, $message, $context);
    }

    public function warning($message, array $context = [])
    {
        $this->log(static::WARNING, $message, $context);
    }

    public function notice($message, array $context = [])
    {
        $this->log(static::NOTICE, $message, $context);
    }

    public function info($message, array $context = [])
    {
        $this->log(static::INFO, $message, $context);
    }

    public function debug($message, array $context = [])
    {
        $this->log(static::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = [])
    {
        $dateFormatted = (new \DateTime())->format('Y-m-d H:i:s');
        // Построение массива подстановки с фигурными скобками
        // вокруг значений ключей массива context.
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }

        // Подстановка значений в сообщение и возврат результата.
        $message = strtr($message, $replace);
        $message = sprintf(
            '[%s] %s: %s %s',
            $dateFormatted,
            $level,
            $message,
            PHP_EOL
        );

        file_put_contents(__DIR__ . '/../logs/' . date('m.d.y') . '.php', $message, FILE_APPEND);
    }
}
