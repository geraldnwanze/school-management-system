<?php

use App\Models\User;

if (!function_exists('superadmin')) {
    function superadmin()
    {
        return auth()->user()->role === User::SUPER_ADMIN;
    }
}

if (!function_exists('admin')) {
    function admin()
    {
        return auth()->user()->role === User::ADMIN;
    }
}

if (!function_exists('staff')) {
    function staff()
    {
        return auth()->user()->role === User::STAFF;
    }
}

if (!function_exists('student')) {
    function student()
    {
        return auth()->user()->role === User::STUDENT;
    }
}