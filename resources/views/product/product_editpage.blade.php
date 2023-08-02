@extends('layout.master')
@section('header')
    Product Edit
@endsection
@section('title')Product-Edit
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_product', ['product' => $product])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle1">Product Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="producttitle" id="" value="{{$product->producttitle}}">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Product Category Id:</label>
            <select class="form-control" name="productcategoryid" id="products">
                <option value="{{null}}" selected>Null</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->id." -> ".$category->categorytitle}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Barcode:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="barcode_edit" id="" value="{{$product->barcode}}">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Product Status:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="productstatus_edit" id="" value="{{$product->productstatus}}">
        </div>
        <button class="btn btn-primary w-100" type="submit">Edit</button>
    </form>
@endsection
