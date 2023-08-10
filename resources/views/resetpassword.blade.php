@extends('layout.loginLayout')
@section('title')
    Password Change
@endsection

@section('content')
    <form action="{{route('change.password', ['id' => $user->id])}}" method="post">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control border rounded" type="password" name="password" id="password"
                   placeholder="New Password">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
            </div>
            <input class="form-control border rounded" type="password" name="password_again" id="password_again"
                   placeholder="New Password again">
        </div>
        <button class="btn btn-primary w-100" type="submit">Change Password</button>
    </form>
@endsection
