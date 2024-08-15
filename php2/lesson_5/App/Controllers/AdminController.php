<?php

namespace App\Controllers;

use App\Exceptions\DbException;
use App\Services\Authentication;

abstract class AdminController extends Controller
{
    /**
     * @throws DbException
     */
    protected function access(): bool
    {
        if (null !== Authentication::getCurrentUser()) {
            return true;
        }

        return false;
    }
}
