<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    private $entries_per_page = 20;

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

    public function show_words (Request $request) {
        $data = [
            'user_words' => Word::where('user_id', Auth::id())->latest()->simplePaginate($this->entries_per_page),
            'user_languages' => Word::where('user_id', Auth::id())->select('language')->distinct()->get(),
            'user_categories' => Word::where('user_id', Auth::id())->select('category')->distinct()->get(),
            'user_month_years' => Word::where('user_id', Auth::id())->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month')->get()
        ];

        // if filtering
        if ($request['filter'] && $request['value']) {
            // filter by lang
            if ($request['filter'] === 'lang') {
                $data['user_words'] = Word::where('user_id', Auth::id())->where('language', $request['value'])->latest()->simplePaginate($this->entries_per_page);
            }
            // filter by category
            if ($request['filter'] === 'category') {
                $data['user_words'] = Word::where('user_id', Auth::id())->where('category', $request['value'])->latest()->simplePaginate($this->entries_per_page);
            }
            // filter by period
            if ($request['filter'] === 'period') {
                $year = explode('-', $request['value'])[0];
                $month = explode('-', $request['value'])[1];
                $data['user_words'] = Word::where('user_id', Auth::id())->whereYear('created_at', $year)->whereMonth('created_at', $month)->latest()->simplePaginate($this->entries_per_page);
            }
        } 

        session(['current_filter' => $request['filter'] . '-' . $request['value']]);

        return view('words', $data);
    }

    // =========================================================

    public function show_form () {
        return view('form');
    }

    // =========================================================
}
