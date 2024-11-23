<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function index()
    {
        return view('admin.admin-dash');
    }

    public function home()
    {
        return view('admin.admin-dash');
    }

    public function category()
    
    {

        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string'
        ]);

        $category = new Category;

        $category ->category_name = $request->category;

        $category->save();

        sweetalert()->success('Category Added Successfully');

        return redirect()->back();
    }




}
