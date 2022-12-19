<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public $category;
    public function index()
    {
        return view('website.home.index',[
        //    'categories' => Category::all(),
            'products' => Product::orderBy('id','desc')->take(8)->get()
        ]);
    }

    public function category($id)
    {
       // $this->category = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('website.category.category-detail',[
           'products' =>  Product::where('category_id', $id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function productDetail($id)
    {
        return view('website.product.detail',[
            'products' => Product::find($id)
        ]);
    }
}
