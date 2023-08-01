@extends('layout.master')
@section('header')
    User
@endsection
@section('title')User
@endsection
@section('content')
    <a class="btn btn-primary w-25 mr-4" href="{{route('register')}}">New User</a>
    <br>
    <a class="btn btn-primary w-25" href="{{route('userlist')}}">User List</a>
@endsection
