@extends('layout.loginLayout')
@section('title')
    Password
@endsection
@section('content')
    <form action="{{route('send.mail')}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
            </div>
            <input class="form-control border rounded" type="text" name="mail" id="mail"
                   placeholder="E-mail">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
            </div>
            <input class="form-control border rounded" type="text" name="username" id="username"
                   placeholder="User name">
        </div>
        <button class="btn btn-primary w-100" type="submit">Send password change link</button>
        <br>
        <br>
        <a href="{{ route('login') }}">Back to login</a>

    </form>
@endsection
