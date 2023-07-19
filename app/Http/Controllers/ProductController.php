<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('productpage');
    }

    public function toAddProduct()
    {

        $categories = Category::all();
        return view('product_add', ["categories" => $categories]);

    }

    public function toProductList()
    {
        $products = Product::all();
        return view('product_listpage', ['products' => $products]);

    }

    public function addProduct(Request $request)
    {
        $request->validate([
            "producttitle" => "required",
            "barcode" => "required",
            "productstatus" => "required",
        ]);

        Product::create([
            "producttitle" => $request->producttitle,
            "productcategoryid" => $request->productcategoryid,
            "barcode" => $request->barcode,
            "productstatus" => $request->productstatus
        ]);

        return redirect()->route('list_product');
    }

    public function toEditProduct(Product $product)
    {
        $categories = Category::all();
        return view('product_editpage', ['categories' => $categories ,'product' => $product]);
    }

    public function editProduct(Request $request, Product $product){
        $request->validate([
            "producttitle" => "required",
            "barcode_edit" => "required",
            "productstatus_edit" => "required",
        ]);

        $product->producttitle = $request->producttitle;
        $product->productcategoryid = $request->productcategoryid;
        $product->barcode = $request->barcode_edit;
        $product->productstatus = $request->productstatus_edit;
        $product->save();

        return redirect()->route('list_product');
    }

    public function deleteProducts(Request $request, ){
        $ids = $request->selectedids;
        if (!($ids == null))
            Product::whereIn('id', $ids)->delete();
        return redirect()->route('list_product');
    }

}
