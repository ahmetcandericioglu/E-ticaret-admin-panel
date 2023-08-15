<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Cache::has('products'))
        {
            $products = Product::all();
            return Cache::put('products', $products, 180);
        }
        else
            return $products = Cache::get('products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'producttitle' => 'required',
            'productcategoryid' => 'nullable',
            'barcode' => 'required|unique:products',
            'productstatus' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        $product = Product::create([
            'producttitle' => $request->producttitle,
            'productcategoryid' => $request->productcategoryid,
            'barcode' => $request->barcode,
            'productstatus' => $request->productstatus,
        ]);

        if (Cache::has('products')){
            $products = Cache::get('products');
            $products[] = $product;
            Cache::put('products', $products, 180);
        }
        Cache::put('products', $products, 180);

        return response()->json(['message' => 'Product added successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product)
            return response()->json(['message' => 'There is no product with this id']);

        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (!$product)
            return response()->json(['message' => 'There is no product with this id']);

        $validator = Validator::make($request->all(), [
            'producttitle' => 'required',
            'productcategoryid' => 'nullable',
            'barcode' => 'required|unique:products,barcode,'.$id,
            'productstatus' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        $product->producttitle = $request->producttitle;
        $product->productcategoryid = $request->productcategoryid;
        $product->barcode = $request->barcode;
        $product->productstatus = $request->productstatus;
        $product->save();

        $products = Product::all();
        Cache::put('products', $products, 180);

        return response()->json(['message' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product)
            return response()->json(['message' => 'There is no product with this id']);

        Product::destroy($id);
        $products = Product::all();
        Cache::put('products', $products, 180);
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function destroySelected($ids)
    {
        $ids = explode(",",$ids);
        Product::whereIn("id",$ids)->delete();
        $products = Product::all();
        Cache::put('products', $products, 180);
        return response()->json(['message' => 'Selected products deleted successfully']);
    }
}
