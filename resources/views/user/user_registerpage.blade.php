@extends('layout.master')

@section('header')
    User Add
@endsection

@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('register_user')}}" method="post">
        @csrf
        <p>Usertitle:</p>
        <input type="text" name="usertitle">
        <p>Username:</p>
        <input type="text" name="username">
        <p>Password:</p>
        <input type="password" name="password">
        <br>
        <br>
        <button type="submit">Add</button>
    </form>
@endsection
