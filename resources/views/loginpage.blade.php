@extends('layout.loginLayout')
@section('title')
Login
@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('loginpost')}}" method="post">
        @csrf
        <p>User Name:</p>
        <input type="text" name="username" id="name">
        <p>Password:</p>
        <input type="password" name="password" id="pass">
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
@endsection
