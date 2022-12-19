<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }
    public function manage()
    {
        return view('admin.unit.manage');
    }
    public function create(Request $request)
    {
        Unit::newUnit($request);
        return redirect('/unit-add')->with('message','New Unit Create Successfully');
    }
}
