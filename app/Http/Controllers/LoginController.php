<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return back()->with('fail', 'Fail!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
