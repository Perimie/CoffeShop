<?php

namespace App\Http\Controllers;

use App\Models\Coffees;
use App\Models\Snacks;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function loginPage()
    {
        return view('home.login');
    }


    public function index(Request $request)
    {
        $coffees = Coffees::all();
        $snacks = Snacks::all();

        return view('home.index' ,compact('coffees', 'snacks'));
    }

    public function coffeePage()
    {
        return view('home.coffee_home');
    }

    public function snackPage()
    {
        return view('home.snack_home');
    }
}
