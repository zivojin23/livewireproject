<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\User;

class ListController extends Controller
{
    public function list()
    {
        $forms = Form::orderBy('updated_at', 'desc')->get();
        return view('/list', compact('forms'));
    }
    
}
