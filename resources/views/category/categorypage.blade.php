@extends('layout.master')
@section('header')
    Category
@endsection
@section('title')Category
@endsection
@section('content')
    <a class="btn btn-primary w-25 mr-4" href="{{route('add_category')}}">New Category</a>
    <br>
    <a class="btn btn-primary w-25" href="{{route('list_category')}}">Category List</a>
@endsection
