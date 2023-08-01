@extends('layout.master')
@section('header')
    Product Delete
@endsection
@section('title')Product-Delete
@endsection
@section('content')
    <form action="{{route('delete_product.post', ['product' => $product])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p>Product Title: {{$product->producttitle}}</p>
        <p>Product Category Id: {{$product->productcategoryid}}</p>
        <p>Barcode: {{$product->barcode}}</p>
        <p>Product Status: {{$product->productstatus}}</p>
        <button type="submit">Delete</button>
    </form>
@endsection
