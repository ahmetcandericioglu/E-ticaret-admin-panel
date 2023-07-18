<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('categorypage');
    }

    public function toAddCategory(){
        return view('category_add');
    }
    public function addCategory(Request $request){
        $request->validate([
            'categorytitle' => 'required|unique:category',
            'categorydescription' => 'required',
            'categorystatus' => 'required',
        ]);

        Category::create([
           'categorytitle' => $request->categorytitle,
           'categorydescription' => $request->categorydescription,
           'categorystatus' => $request->categorystatus,
        ]);

        return redirect()->route('add_category');
    }
}
