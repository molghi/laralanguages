<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ============================================================

    public function signup (Request $request) {
        // get form data, validate
        $data = $request->validate([
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        // encrypt pw
        $data['password'] = bcrypt($data['password']);

        // push to db & return
        $user = User::create($data);

        // log em in
        Auth::login($user);

        // redir to page
        return redirect('/words')->with('success', 'Signup successful!');
    }

    // ============================================================

    public function login (Request $request) {
        // get form data, validate
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/words')->with('success', 'Logged in!');
        }

        return back()->withErrors([
            'login_fail' => 'The provided credentials do not match our records.'
        ]);
    }

    // ============================================================

    public function logout () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logged out!');
    }
}
