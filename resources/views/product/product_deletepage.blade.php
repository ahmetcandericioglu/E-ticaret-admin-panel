@extends('layout.master')
@section('header')
    Product Delete
@endsection
@section('title')Product-Delete
@endsection
@section('content')
    <form action="{{route('delete_product.post', ['product' => $product])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p><span class="font-weight-bold">Product Title: </span>{{$product->producttitle}}</p>
        <p><span class="font-weight-bold">Product Category Id: </span>{{$product->productcategoryid}}</p>
        <p><span class="font-weight-bold">Barcode: </span>{{$product->barcode}}</p>
        <p><span class="font-weight-bold">Product Status: </span>{{$product->productstatus}}</p>
        <button class="btn btn-danger w-100" type="submit">Delete</button>
    </form>
@endsection
