@extends('layout.master')
@section('header')
    User Delete
@endsection
@section('content')
    <form action="{{route('delete_user', ['user' => $user])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p>User Name: {{$user->username}}</p>
        <p>User Title: {{$user->usertitle}}</p>
        <button type="submit">Delete</button>
    </form>
@endsection
