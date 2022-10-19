<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;
use App\Models\User;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        

        $user = Auth::user();

        // if(Auth::user()) 
        // {
            return view('home');
        // }
        // else
        // {
            // return "FAIL";
        // }
        // auth()->login($user);
        
    }
}
