<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-delete</title>
</head>
<body>
<header>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('user')}}">User</a>
    <a href="{{route('category')}}">Category</a>
</header>
@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
<div>
    <form action="{{route('delete_user', ['user' => $user])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <h1>Edit User</h1>
        <p>User Name: {{$user->username}}</p>
        <p>User Title: {{$user->usertitle}}</p>
        <button type="submit">Delete</button>
    </form>
</div>
</body>
</html>
