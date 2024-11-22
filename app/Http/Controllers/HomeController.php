<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function loginPage()
    {
        return view('home.login');
    }


    public function index()
    {
        return view('home.index');
    }

    
}
