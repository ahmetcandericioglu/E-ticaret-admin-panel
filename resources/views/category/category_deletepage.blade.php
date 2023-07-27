@extends('layout.master')
@section('header')
    User Delete
@endsection
@section('content')
    <form action="{{route('delete_category.post', ['category' => $category])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p>Category Title: {{$category->categorytitle}}</p>
        <p>Category Description: {{$category->categorydescription}}</p>
        <p>Category Status: {{$category->categorystatus}}</p>
        <button type="submit">Delete</button>
    </form>
@endsection
