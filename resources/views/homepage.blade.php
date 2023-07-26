@extends('layout.master')
@section('header')
    Home
@endsection

@section('content')

    <a href="{{route('user')}}">User</a>
    <br>
    <a href="{{route('category')}}">Category</a>
    <br>
    <a href="{{route('product')}}">Product</a>
    <a href="logout">Logout</a>
@endsection
