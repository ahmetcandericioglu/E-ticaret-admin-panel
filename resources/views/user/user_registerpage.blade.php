@extends('layout.userLayout')
@section('content')
    <h3>User Add</h3>
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
        <button type="submit">Register</button>
    </form>
@endsection
