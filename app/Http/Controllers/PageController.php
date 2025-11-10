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

    public function show_lang_prompt () {
        $data = [
            'user_languages' => Word::where('user_id', Auth::id())->select('language')->distinct()->pluck('language')
        ];
        return view('lang_prompt', $data);
    }

    // =========================================================

    public function fetch_practice_words (Request $request) {
        $allowed_options = Word::where('user_id', Auth::id())->select('language')->distinct()->pluck('language')->toArray();

        session(['language_practicing' => $request['language']]);
        
        $option_is_allowed = in_array(strtolower($request['language']), $allowed_options);

        if (!$option_is_allowed) {
            return back()->with('error', 'Option not recognized: type 2-letter code');
        } else {
            // fetch 5 entries in this lang whose next_revision is suitable now
            $how_many = 5;
            $entries = Word::where('user_id', Auth::id())
                        ->where('language', strtolower($request['language']))
                        ->where(function($query) {
                                $query->whereNull('next_revision')
                                    ->orWhere('next_revision', '<=', now());
                                })
                        ->take($how_many)->get();
            
            session(['entries' => $entries]);
            session(['round_counter' => 0]);
            return redirect('/practice/rounds');
        }
    }

    // =========================================================

    public function show_round () {
        return view('round');
    }

    // =========================================================

    public function proceed_in_quiz () {
        $sesh_counter = session('round_counter');
        $entries = session('entries');
        session(['round_counter' => (int) $sesh_counter + 1]);
        return view('round');
    }

    // =========================================================

    public function show_finish_screen () {
        session(['success' => 'Quiz finished! Now assess your knowledge.']);
        return view('assess_knowledge');
    }

    // =========================================================

    public function register_quiz_results (Request $request) {
        // receive quiz results
        $results = $request['results'];
        $results = json_decode($results, true); // make it assoc arr

        // get practiced words' ids
        $rounds_data = session('entries');
        
        // update entries -- spaced repetition system
        foreach ($rounds_data as $index => $round) { 
            $word_id = $round['id'];
            $result = $results[$index]; // associated result
            $next_when = now(); // default, fallback

            if ($result === 'forgot') $next_when = now()->addMinute(); // in 1 minute
            if ($result === 'barely') $next_when = now()->addDay(); // in 1 day
            if ($result === 'okay') $next_when = now()->addDays(3); // in 3 days
            if ($result === 'easily') $next_when = now()->addDays(6); // in 6 days

            Word::where('user_id', Auth::id())->where('id', $word_id)
                    ->update(['next_revision' => $next_when]);
        }

        // reset sesh vars
        session(['entries' => []]);
        session(['round_counter' => 0]);

        // return to /words with a message
        return redirect('/words')->with('success', 'Quiz results saved!');
    }

    // =========================================================
}
