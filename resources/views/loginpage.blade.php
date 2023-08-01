@extends('layout.loginLayout')
@section('title')
    Login
@endsection
@section('content')
    <div class="mt-2">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        @endif
    </div>

    <form action="{{route('loginpost')}}" method="post">
        @csrf
        <div class="mb-5 mt-3">
            <input class="mb-3 p-2 border rounded" type="text" name="username" id="name" placeholder="User Name">
            <br>
            <input class="p-2 border rounded" type="password" name="password" id="pass" placeholder="Password">
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
        </div>

    </form>
@endsection
