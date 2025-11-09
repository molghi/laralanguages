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

    // export
    public function return_words_json () {
        // get entries
        $user_words = Word::where('user_id', Auth::id())->get();
        // set the response body as JSON, set the Content-Type: application/json header; and tell the browser to treat the response as a downloadable file
        return response()->json($user_words)
                ->header('Content-Disposition', 'attachment; filename="easy-lang-coach--words.json"');
    }

    // ========================================================

    public function process_import (Request $request) {
        if ($request->file('import')->getClientOriginalExtension() !== 'json') {
            return back()->with('error', 'Only JSON type is valid.');
        } else {
            // parse file, update db
            $file = $request->file('import');
            $contents = $file->get();
            $arrayed = json_decode($contents, true);
            $existing_entries_ids = Word::where('user_id', Auth::id())->pluck('id')->toArray();
            foreach($arrayed as $entry) {
                if (in_array($entry['id'], $existing_entries_ids)) {
                    // if exists, update
                    $entry['user_id'] = Auth::id();
                    unset($entry['created_at'], $entry['updated_at']);
                    Word::where('user_id', Auth::id())->where('id', $entry['id'])->update($entry);
                } else {
                    // if doesn't exist, create
                    $entry['user_id'] = Auth::id();
                    unset($entry['id'], $entry['created_at'], $entry['updated_at']);
                    Word::create($entry);
                }
            }
            return redirect('/words')->with('success', 'Import successful!');
        }
    }

    // ========================================================
}
