@extends('layout.master')
@section('header')
    User Edit
@endsection
@section('title')User-Edit
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_user', ['user' => $user])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1">User Name:</label>
            <input class="form-control" id="exampleInputName1" type="text" name="username" id="" value="{{$user->username}}">
        </div>
        <div class="form-group">
            <label for="exampleInputTitle1">User Title:</label>
            <input class="form-control" id="exampleInputTitle1" type="text" name="usertitle_edit" id="" value="{{$user->usertitle}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password:</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="password_edit" id="">
        </div>
        <br>
        <button class="btn btn-primary w-100" type="submit">Edit</button>
    </form>
@endsection
