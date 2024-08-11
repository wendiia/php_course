<?php

namespace App\Controllers;

use App\Authentication;

abstract class AdminController extends Controller
{
    protected function access(): bool
    {
        if (null !== Authentication::getCurrentUser()) {
            return true;
        }

        return false;
    }
}
