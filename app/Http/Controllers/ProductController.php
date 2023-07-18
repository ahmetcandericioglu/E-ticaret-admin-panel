<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('productpage');
    }

    public function toAddProduct(){

        $categories = Category::all();
        return view('product_add', ["categories" => $categories]);

    }

    public function toProductList(){

        $categories = Category::all();
        return view('product_listpage');

    }

    public function addProduct(Request $request){
        $request->validate([
            "producttitle" => "required",
            "barcode" => "required",
            "productstatus" => "required",
        ]);

        Product::create([
           "producttitle"  => $request->producttitle,
           "productcategoryid"  => $request->productcategoryid,
           "barcode"  => $request->barcode,
           "productstatus"  => $request->productstatus
        ]);

        return redirect()->route('list_product');

    }
}
