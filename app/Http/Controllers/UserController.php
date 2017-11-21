<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth as Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function get404()
    {
        return view('404');
    }
    
}
