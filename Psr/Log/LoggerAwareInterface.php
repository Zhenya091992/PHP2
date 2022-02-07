<?php

namespace Psr\Log;
//класс установщик того или иного класса реализ. LoggerInterface
interface LoggerAwareInterface
{
    public function setLogger(LoggerInterface $logger);
}
