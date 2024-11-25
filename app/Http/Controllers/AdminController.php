<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;


class AdminController extends Controller
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

    public function edit_category(Request $request , $id)
    {
        $request->validate([
            'category' => 'required|string'
        ]);

        $category = Category::find($id);

        if($category)
        {
            $category->category_name = $request->category;
            $category->save();
            sweetalert()->success('Category edited Succesfully.');
            return redirect()->back();
        }
        else
        {
            sweetalert()->error('Category not edited');
            return redirect()->back();
        }
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();
        
        sweetalert()->success('Category deleted Succesfully.');
        return redirect()->back();
    }


    public function products()
    
    {
        $category = Category::all();
       
        return view('admin.products', compact('category'));
    }


    public function add_product(Request $request)
    {
        $product = new Products;

        $product->productName = $request->productName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $image = $request->image;
        
        
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('items', $imagename );

            $product->image = $imagename;
        }
        

        $product->save();

        sweetalert()->success('Product Added Succesfully.');

        return redirect()->back();

    }
}
