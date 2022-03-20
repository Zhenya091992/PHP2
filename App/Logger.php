<?php

namespace App;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;

class Logger extends LogLevel implements LoggerInterface
{
    use LoggerTrait;

    public function log($level, $message, array $context = []): void
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
