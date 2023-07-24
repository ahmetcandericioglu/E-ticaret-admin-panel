@extends('layout.master')
@section('header')
    User
@endsection
@section('content')
    <a href="{{route('register')}}">New User</a>
    <br>
    <a href="{{route('userlist')}}">User List</a>
@endsection
