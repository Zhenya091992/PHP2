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
        foreach ($this->arrayModels as $model) {
            $firstElement = true;
            foreach ($this->arrayFunctions as $function) {
                if ($firstElement == true) {
                    $firstElement = false;
                    $id = $function($model);

                    yield '<td><a href="/PHP2/Admin/Admin/EditNews?id=' . $id . '">' . $id . '</a></td>';
                    continue;
                }

                yield '<td>' . $function($model) . '</td>';
            }

            yield '</tr><tr>';
        }
    }
}
