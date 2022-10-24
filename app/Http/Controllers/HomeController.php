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

        return view('home', [
            'user' => Auth::user()
        ]);
    }

    public function list()
    {
        return view('list', [
            'user'  => Auth::user(),
            'forms' => Form::orderBy('updated_at', 'desc')->get()
        ]);
    }
}
