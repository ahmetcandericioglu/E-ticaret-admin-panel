@extends('layout.master')
@section('header')
    Category Delete
@endsection
@section('title')Category-Delete
@endsection
@section('content')
    <form action="{{route('delete_category.post', ['category' => $category])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p><span class="font-weight-bold">Category Title: </span>{{$category->categorytitle}}</p>
        <p><span class="font-weight-bold">Category Description: </span>{{$category->categorydescription}}</p>
        <p><span class="font-weight-bold">Category Status: </span>{{$category->categorystatus}}</p>
        <button class="btn btn-danger w-100" type="submit">Delete</button>
    </form>
@endsection
