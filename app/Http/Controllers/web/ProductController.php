<?php

namespace App\Http\Controllers\web;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index() {
        return view('product/productpage');
    }

    public function toAddProduct()
    {

        $categories = Category::all();
        return view('product/product_add', ["categories" => $categories]);

    }

    public function toProductList()
    {

        if (!Cache::has('products'))
        {
            $products = Product::all();
            Cache::put('products', $products, 180);
        }
        else
            $products = Cache::get('products');
        return view('product/product_listpage', ['products' => $products]);

    }

    public function addProduct(Request $request)
    {
        $request->validate([
            "producttitle" => "required",
            "barcode" => "required",
            "productstatus" => "required",
        ]);

        $product = Product::create([
            "producttitle" => $request->producttitle,
            "productcategoryid" => $request->productcategoryid,
            "barcode" => $request->barcode,
            "productstatus" => $request->productstatus
        ]);

        $products = Product::all();
        Cache::put('products', $products, 180);

        return redirect()->route('list_product');
    }

    public function toEditProduct(Product $product)
    {
        $categories = Category::all();
        return view('product/product_editpage', ['categories' => $categories, 'product' => $product]);
    }

    public function editProduct(Request $request, Product $product)
    {
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

        $products = Product::all();
        Cache::put('products', $products, 180);

        return redirect()->route('list_product');
    }

    public function deleteProducts(Request $request,)
    {
        $ids = $request->selectedids;
        if (!($ids == null))
            Product::whereIn('id', $ids)->delete();
        $products = Product::all();
        Cache::put('products', $products, 180);
        return redirect()->route('list_product');
    }

    public function toDeleteProduct(Product $product)
    {
        return view('product/product_deletepage', ['product' => $product]);
    }

    public function deleteProduct(Product $product){
        $product->delete();
        $products = Product::all();
        Cache::put('products', $products, 180);
        return redirect()->route('list_product');
    }

}
