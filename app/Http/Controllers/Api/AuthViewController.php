<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AuthViewController extends Controller
{
    public function index()
    {
        return view('auth.passport-auth');
    }
}
