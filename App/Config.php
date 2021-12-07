<?php

namespace App;

use App\traits\Singleton;

class Config
{
    use Singleton;

    public $configData;

    protected function __construct()
    {
        $this->configData = include __DIR__ . '../../config.php';
    }
}
