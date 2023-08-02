@extends('layout.master')
@section('header')
    Product Add
@endsection
@section('title')Product-Add
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('add_new_product')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle1">Product Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="producttitle" id="">
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
            <input class="form-control" id="exampleInputTitle1" type="text" name="barcode" id="">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Product Status:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="productstatus" id="">
        </div>
        <button class="btn btn-primary w-100" type="submit">Add</button>
    </form>
@endsection
