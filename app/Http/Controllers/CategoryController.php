<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categorypage');
    }

    public function toAddCategory()
    {
        return view('category_add');
    }

    public function addCategory(Request $request)
    {
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

    public function toCategoryList()
    {
        $categories = Category::all();
        return view('category_listpage', ["categories" => $categories]);
    }

    public function deleteCategories(Request $request)
    {
        $ids = $request->selectedids;
        if (!($ids == null)) {
            $categoryProducts = Product::query()->whereIn("productcategoryid", $ids)->get();
            foreach ($categoryProducts as $product) {
                $product->productcategoryid = null;
                $product->save();
            }
            Category::whereIn('id', $ids)->delete();
        }
        return redirect()->route('list_category');
    }
}
