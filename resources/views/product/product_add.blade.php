@extends('layout.master')
@section('header')
    Product Add
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('add_new_product')}}" method="post">
        @csrf
        <p>Product Title:</p>
        <input type="text" name="producttitle" id="">
        <p>Product Category Id:</p>
        <select name="productcategoryid" id="products">
            <option value="{{null}}" selected>Null</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->id." -> ".$category->categorytitle}}</option>
            @endforeach
        </select>
        <p>Barcode:</p>
        <input type="text" name="barcode" id="">
        <p>Product Status:</p>
        <input type="text" name="productstatus" id="">
        <br>
        <br>
        <button type="submit">Add</button>
    </form>
@endsection
