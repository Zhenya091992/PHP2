<?php

namespace App\Controllers;

abstract class Admin extends Controller
{
    public function action(string $nameMethod)
    {
        if ($this->access()) {
            $this->$nameMethod();
        } else {
            $this->actionSignIn();
        }
    }

    public function access()
    {
        if ($_GET['user'] == 'exit') {
            unset($_SESSION['user']);

            return false;
        } else {
            return !empty($_SESSION['user']);
        }

    }
}
