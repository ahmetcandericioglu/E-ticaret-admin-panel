@extends('layout.master')
@section('header')
    Category Edit
@endsection
@section('title')Category-Edit
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_category', ['category' => $category])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle1">Category Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorytitle" id="" value="{{$category->categorytitle}}">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Category Description:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorydescription_edit" id="" value="{{$category->categorydescription}}">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Category Status:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorystatus_edit" id="" value="{{$category->categorystatus}}">
        </div>
        <button class="btn btn-primary w-100" type="submit">Edit</button>
    </form>
@endsection
