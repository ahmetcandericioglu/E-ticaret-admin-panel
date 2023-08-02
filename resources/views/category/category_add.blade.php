@extends('layout.master')
@section('header')
    Category Add
@endsection
@section('title')Category-Add
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('add_new_category')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="exampleInputTitle1">Category Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorytitle" id="">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Category Description:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorydescription" id="">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">Category Status:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="categorystatus" id="">
        </div>
        <button class="btn btn-primary w-100" type="submit">Add</button>
    </form>
@endsection
