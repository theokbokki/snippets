<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(Request $request)
    {
        return view('pages.login');
    }

    public function store(StoreLoginRequest $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
