<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private  $products, $product, $subcategories, $categories, $brands, $units;
    public function index()
    {
        return view('admin.product.index',[
           'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }
    public function create(Request $request)
    {

       $this->product = Product::newProduct($request);
       SubImage::newSubImage($this->product, $request->file('sub_ image'));
        return redirect('/product.add')->with('message', 'New Product Create Successfully');
    }

    public function manage()
    {
        $this->products = Product::all();
        return view('admin.product.manage',['products' => $this->products]);
    }

    public function detail($id)
    {
        $this->product = Product::find($id);

        return view('admin.product.detail-product',['product'=>$this->product]);
    }
}
