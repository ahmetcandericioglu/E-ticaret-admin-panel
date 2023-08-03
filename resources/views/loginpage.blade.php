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

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input class="form-control border rounded" type="text" name="username" id="name"
                       placeholder="User Name">
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                </div>
                <input class="form-control border rounded" type="password" name="password" id="pass"
                       placeholder="Password">
            </div>
            <div>
                <a href="{{route('forget.password')}}">Forget Password?</a>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
        </div>
    </form>
@endsection
