@extends('layout.master')
@section('header')
    Product Edit
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_product', ['product' => $product])}}" method="post">
        @csrf
        <p>Product Title:</p>
        <input type="text" name="producttitle" id="" value="{{$product->producttitle}}">
        <p>Product Category Id:</p>
        <select name="productcategoryid">
            <option value="{{null}}" selected>Null</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" >{{$category->id." -> ". $category->categorytitle}}</option>
            @endforeach
        </select>

        <p>Barcode:</p>
        <input type="text" name="barcode_edit" id="" value="{{$product->barcode}}">
        <p>Product Status:</p>
        <input type="text" name="productstatus_edit" id="" value="{{$product->productstatus}}">
        <br>
        <br>
        <button type="submit">Edit</button>
    </form>
@endsection
