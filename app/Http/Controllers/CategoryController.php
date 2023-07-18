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
    public function toEditCategory(Category $category){
        return view('category_editpage', ['category' => $category]);
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

    public function toCategoryList(){
        $categories = Category::all();
        return view('category_listpage', ["categories" => $categories]);
    }

    public function deleteCategories(Request $request){
        $ids = $request->selectedids;
        if (!($ids == null))
            Category::whereIn('id', $ids)->delete();
        return redirect()->route('list_category');
    }

    public function editCategory(Request $request, Category $category){
        $request->validate([
            "categorytitle" => "required",
            "categorydescription_edit" => "required",
            "categorystatus_edit" => "required",
        ]);

        if (!($request->categorytitle == $category->categorytitle)) {
            $duplicate = Category::where('categorytitle', '=', $request->categorytitle)->first();
            if ($request->categorytitle)
                if (!($duplicate == "")) {
                    $request->validate([
                        "categorytitle" => "unique:category",
                    ]);
                }
        }
            $category->categorytitle = $request->categorytitle;
            $category->categorydescription = $request->categorydescription_edit;
            $category->categorystatus = $request->categorystatus_edit;
            $category->save();

        return view('category_editpage', ['category' => $category]);



    }
}
