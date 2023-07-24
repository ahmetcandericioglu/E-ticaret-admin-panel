@extends('layout.master')
@section('header')
    Product
@endsection
@section('content')
    <a href="{{route('add_product')}}">New Product</a>
    <br>
    <a href="{{route('list_product')}}">Product List</a>
@endsection
