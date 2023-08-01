@extends('layout.master')

@section('header')
    Home
@endsection

@section('title')Home
@endsection

@section('content')
    <a class="btn btn-primary w-25 mr-4" href="{{route('user')}}">User</a>
    <br>
    <a class="btn btn-primary w-25 mr-4" href="{{route('category')}}">Category</a>
    <br>
    <a class="btn btn-primary w-25" href="{{route('product')}}">Product</a>
    </div>
@endsection
