<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::newCategory($request);
        return redirect('/category-add')->with('message', 'New Category Create Successfully');
    }

    public function manage()
    {
        return view('admin.category.manage');
    }
}
