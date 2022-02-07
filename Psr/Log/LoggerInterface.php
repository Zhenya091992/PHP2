<?php

namespace Psr\Log;

interface LoggerInterface
{
//$messege = 'User {name} not found;
    public function emergency($message, array $context = []); // массив параметров кот.могут подставляться к примеру п.9 в ['name'='Вася'] подставляется. далее в п.9 {name} должно заменяться на конкр.знач.
    public function alert($message, array $context = []); // по умолч.пустой массив
    public function critical($message, array $context = []);
    public function error($message, array $context = []);
    public function warning($message, array $context = []);
    public function notice($message, array $context = []);
    public function info($message, array $context = []);
    public function debug($message, array $context = []);
    public function log($level, $message, array $context = []);
}
