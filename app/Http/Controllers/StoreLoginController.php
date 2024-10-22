<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;

class StoreLoginController extends Controller
{
    public function __invoke(StoreLoginRequest $request)
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
