<?php

namespace App;

class AdminDataTable
{
    protected $arrayModels;
    protected $arrayFunctions;

    public function __construct($arrayModels , array $arrayFunctions = [])
    {
        $this->arrayModels = $arrayModels;
        $this->arrayFunctions = $arrayFunctions;
    }

    public function render()
    {
        $result = [];
        foreach ($this->arrayModels as $key => $model) {
            foreach ($this->arrayFunctions as $function) {
                $result[$key][] = $function($model);
            }
        }
        return $result;
    }
}