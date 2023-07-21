@extends('layout.categoryLayout')
@section('content')
    <a href="{{route('add_category')}}">New Category</a>
    <br>
    <a href="{{route('list_category')}}">Category List</a>
@endsection
