<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create(Request $request)
    {
        Brand::newBrand($request);
        return redirect('/brand-add')->with('message','New Brand Create Successfully');
    }
    public function manage()
    {
        return view('admin.brand.manage');
    }
}
