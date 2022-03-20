<?php

namespace App\Controllers;

abstract class Guest extends Controller
{
    public function access()
    {
        return false;
    }
}
