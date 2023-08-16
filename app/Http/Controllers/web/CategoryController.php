<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index(){
        return view('category/categorypage');
    }

    public function toAddCategory(){
        return view('category/category_add');
    }
    public function toEditCategory(Category $category){
        return view('category/category_editpage', ['category' => $category]);
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
        if (!Cache::has('categories'))
        {
            $categories = Product::all();
            Cache::put('categories', $categories, 180);
        }
        else
            $categories = Cache::get('categories');
        return view('category/category_listpage', ["categories" => $categories]);
    }

    public function deleteCategories(Request $request){
        $ids = $request->selectedids;
        if (!($ids == null)) {
            $categoryProducts = Product::query()->whereIn("productcategoryid", $ids)->get();
            $categoryProducts->toQuery()->update([
                'productcategoryid' => null,
            ]);
            Category::whereIn('id', $ids)->delete();

        }
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
        return view('category/category_deletepage', ['category' => $category]);
    }

    public function deleteCategory(Category $category){

        $categoryProducts = Product::where("productcategoryid", $category->id)->get() ;
        $categoryProducts->toQuery()->update([
            'productcategoryid' => null,
        ]);
        $category->delete();
        return redirect()->route('list_category');
    }

}
