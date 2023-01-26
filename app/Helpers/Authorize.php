<?php

use App\Models\User;

if (!function_exists('authorized')) {
    function authorized()
    {
        return auth()->user()->role === User::SUPER_ADMIN || auth()->user()->role === User::ADMIN ? true : false;
    }
}