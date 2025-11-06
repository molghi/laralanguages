<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function store (Request $request) {
        // get form data, validate
        $data = $request->validate([
            'word_phrase' => 'required|string|min:2|max:255',
            'language' => 'required|string',
            'translation' => 'nullable',
            'definition' => 'nullable',
            'category' => 'nullable',
            'web_img' => 'nullable',
            'example_usage' => 'nullable',
            'note' => 'nullable',
        ]);

        // add user 
        $data['user_id'] = Auth::id();

        // push to db
        Word::create($data);

        // redir w/ msg
        return back()->with('success', 'Entry added!');
    }

    // ========================================================

    public function destroy ($id) {
        Word::where('user_id', Auth::id())->where('id', $id)->delete();
        return redirect('/words')->with('success', 'Entry deleted!');
    }

    // ========================================================

    public function edit ($id) {
        $data = [
            'entry' => Word::find($id)
        ];
        return view('form', $data);
    }

    // ========================================================

    public function update (Request $request, $id) {
        // get form data, validate
        $data = $request->validate([
            'word_phrase' => 'required|string|min:2|max:255',
            'language' => 'required|string',
            'translation' => 'nullable',
            'definition' => 'nullable',
            'category' => 'nullable',
            'web_img' => 'nullable',
            'example_usage' => 'nullable',
            'note' => 'nullable',
        ]);

        // push to db
        Word::where('user_id', Auth::id())->where('id', $id)->update($data);

        // redir w/ msg
        return redirect('/words')->with('success', 'Entry updated!');
    }

    // ========================================================
}
