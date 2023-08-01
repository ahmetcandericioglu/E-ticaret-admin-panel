@extends('layout.master')
@section('header')
    User Delete
@endsection
@section('title')User-Delete
@endsection
@section('content')
    <form action="{{route('delete_user', ['user' => $user])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <p><span class="font-weight-bold">User Name: </span>{{$user->username}}</p>
        <p><span class="font-weight-bold">User Title: </span>{{$user->usertitle}}</p>
        <button class="btn btn-danger w-100" type="submit">Delete</button>
    </form>
@endsection
