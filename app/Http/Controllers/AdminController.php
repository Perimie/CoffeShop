<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Snacks;
use App\Models\Coffees;



class AdminController extends Controller
{

    //home-admin controller
    public function index()
    {
        return view('admin.admin-dash');
    }

    public function home()
    {
        return view('admin.admin-dash');
    }

    //end of -home-admin controller



//Coffees contoller
    public function products()
    
    {
        $coffees = Coffees::all();
       
        return view('admin.products', compact('coffees'));
    }


    public function add_product(Request $request)
    {
        $product = new Coffees;

        $product->productName = $request->productName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $image = $request->image;
        
        
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('items', $imagename );

            $product->image = $imagename;
        }
        

        $product->save();

        sweetalert()->success('Coffee Added Succesfully.');

        return redirect()->back();

    }
    // end of coffees controller


    //snacks controller

    public function snacks()
    
    {
       $snacks = Snacks::all(); 
       
        return view('admin.snacks', compact('snacks'));
    }


    public function add_snacks(Request $request)
    {
        $product = new Snacks;

        $product->productName = $request->productName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $image = $request->image;
        
        
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('items', $imagename );

            $product->image = $imagename;
        }
        

        $product->save();

        sweetalert()->success('Snack Added Succesfully.');

        return redirect()->back();

    }

    //end of snacks controller

}
