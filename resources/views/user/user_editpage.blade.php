@extends('layout.master')
@section('header')
    User Edit
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_user', ['user' => $user])}}" method="post">
        @csrf
        <p>User Name:</p>
        <input type="text" name="username" id="" value="{{$user->username}}">
        <p>User Title:</p>
        <input type="text" name="usertitle_edit" id="" value="{{$user->usertitle}}">
        <p>Password:</p>
        <input type="text" name="password_edit" id="">
        <br>
        <br>
        <button type="submit">Edit</button>
    </form>
@endsection
