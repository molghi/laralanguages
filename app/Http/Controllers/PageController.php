<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // =========================================================

    public function show_login () {
        if (Auth::id()) {
            return redirect('/words'); // if logged in and accessing this route, take to /words
        }

        return view('login');
    }

    // =========================================================

    public function show_signup () {
        if (Auth::id()) {
            return redirect('/words'); // if logged in and accessing this route, take to /words
        }

        return view('signup');
    }

    // =========================================================

    public function show_words () {
        $data = [
            'user_words' => Word::where('user_id', Auth::id())->latest()->get()
        ];
        return view('words', $data);
    }

    // =========================================================

    public function show_form () {
        return view('form');
    }

    // =========================================================
}
