<?php

namespace App\Http\Controllers\api;

use App\Models\Category;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'categorytitle' => 'required|unique:categories',
            'categorydescription' => 'required',
            'categorystatus' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        $category = new Category();
        $category->categorytitle = $request->categorytitle;
        $category->categorydescription = $request->categorydescription;
        $category->categorystatus = $request->categorystatus;
        $category->save();

        return response()->json(['message' => 'Category added']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if (!$category)
            return response()->json(['message' => 'There is no category with this id']);

        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category)
            return response()->json(['message' => 'There is no category with this id']);

        $validator = Validator::make($request->all(), [
            'categorytitle' => 'required|unique:categories,categorytitle,' . $id,
            'categorydescription' => 'required',
            'categorystatus' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json($validator->errors(), 422));
        }

        $category->categorytitle = $request->categorytitle;
        $category->categorydescription = $request->categorydescription;
        $category->categorystatus = $request->categorystatus;
        $category->save();

        return response()->json(['message' => 'Category updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category)
            return response()->json(['message' => 'There is no category with this id']);

        Category::destroy($id);
        return response()->json(['message' => 'Category deleted']);
    }

    public function destroySelected($ids)
    {
        $ids = explode(",", $ids);
        Category::whereIn("id", $ids)->delete();
        return response()->json(['message' => 'Selected categories deleted successfully']);
    }
}
