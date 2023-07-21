@extends('layout.master')
@section('title')
    <h1>Home</h1>
@endsection

@section('content')
    <a href="{{route('user')}}">User</a>
    <br>
    <a href="{{route('category')}}">Category</a>
    <br>
    <a href="{{route('product')}}">Product</a>
@endsection
