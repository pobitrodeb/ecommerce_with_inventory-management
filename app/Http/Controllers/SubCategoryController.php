<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public $category, $subCategory;
    public function index()
    {
       $this->category= Category::all();
        return view('admin.sub-category.index',['categorys'=> $this->category]);
    }

    public static function create(Request $request)
    {

//        $request->validate([
//                'name' =>'required|unique:sub-categories'
//        ]);

        SubCategory::newSubcategory($request);
        return redirect('/sub-category-add')->with('message', 'Sub Category Create Successfully');
    }


    public function manage()
    {
        $this->subCategory = SubCategory::all();
        return view('admin.sub-category.manage',['subCategories' => $this->subCategory]);
    }
}
