<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function list()
    {
        // $forms = Form::orderBy('updated_at', 'desc')->get();
        return view('/list', [
            'forms' => Form::orderBy('updated_at', 'desc')->get(),
            'users' => Auth::user()
        ]);
    }
    
}
