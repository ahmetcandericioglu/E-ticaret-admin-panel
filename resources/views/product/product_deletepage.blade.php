@extends('layout.productLayout')
@section('content')
    <h3>Product Delete</h3>
    <form action="{{route('delete_product', ['product' => $product])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p>Product Title: {{$product->producttitle}}</p>
        <p>Product Category Id: {{$product->productcategoryid}}</p>
        <p>Barcode: {{$product->barcode}}</p>
        <p>Product Status: {{$product->productstatus}}</p>
        <button type="submit">Delete</button>
    </form>
@endsection
