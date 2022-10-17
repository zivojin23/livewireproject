<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $reg = $user->save();

        // Auth::login($user);

        if($reg)
        {
            return back()->with('success', 'Success!');
        }
        else
        {
            return back()->with('fail', 'Fail!');
        }

        return redirect('/dashboard');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            }
            else
            {
                return back()->with('fail', 'Wrong Password');
            }
        }
        else
        {
            return back()->with('fail', 'Invalid Email');
        }
    }

    public function dashboard()
    {
        $data = array();
        if(session::has('loginId'))
        {
            $data = User::where('id', '=', session::get('loginId'))->first();
        }
        return view('/dashboard', compact('data'));
    }
    
    public function logout()
    {
        if(session::has('loginId'))
        {
            (session::pull('loginId'));
            return redirect('/');
        }
    }

    public function showUser()
    {
        $user = Auth::user();
    }
}
