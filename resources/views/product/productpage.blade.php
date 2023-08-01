@extends('layout.master')
@section('header')
    Product
@endsection
@section('title')Product
@endsection
@section('content')
    <a class="btn btn-primary w-25 mr-4" href="{{route('add_product')}}">New Product</a>
    <br>
    <a class="btn btn-primary w-25" href="{{route('list_product')}}">Product List</a>
@endsection
