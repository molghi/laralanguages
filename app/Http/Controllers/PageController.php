<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // =========================================================

    public function show_login () {
        return view('login');
    }

    // =========================================================

    public function show_signup () {
        return view('signup');
    }

    // =========================================================

    public function show_words () {
        return view('words');
    }

    // =========================================================
}
