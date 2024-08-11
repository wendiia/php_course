<?php

namespace App\Controllers;

use App\Services\Authentication;

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
