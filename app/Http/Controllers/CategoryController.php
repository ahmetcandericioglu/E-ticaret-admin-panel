<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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

        return redirect()->route('list_category');
    }

    public function toCategoryList(){
        $categories = Category::all();
        return view('category_listpage', ["categories" => $categories]);
    }

    public function deleteCategories(Request $request){
        $ids = $request->selectedids;
        $categoryProducts = Product::query()->whereIn("productcategoryid", $ids)->get() ;
        foreach ($categoryProducts as $product){
            $product->productcategoryid = null;
            $product->save();
        }
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

        return redirect()->route('list_category');
    }

    public function toDeleteCategory(Category $category){
        return view('category_deletepage', ['category' => $category]);
    }

    public function deleteCategory(Category $category){

        $categoryProducts = Product::where("productcategoryid", $category->id)->get() ;
        foreach ($categoryProducts as $product){
            $product->productcategoryid = null;
            $product->save();
        }
        $category->delete();
        return redirect()->route('list_category');
    }

}
