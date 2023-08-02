@extends('layout.master')

@section('header')
    User Add
@endsection

@section('title')User-Add
@endsection

@section('content')


    <form action="{{route('register_user')}}" method="post">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
        @csrf
        <div class="form-group">
            <label for="exampleInputTitle1">User Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="usertitle" id="">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">User Name:</label>
            <input class="form-control" id="exampleInputName1" type="text" name="username" id="" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password" id="">
        </div>
        <br>
        <button class="btn btn-primary w-100" type="submit">Edit</button>
    </form>
@endsection
