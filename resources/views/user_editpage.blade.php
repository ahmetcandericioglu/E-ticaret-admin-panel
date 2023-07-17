<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-edituser</title>
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
    <form action="{{route('edit_user', ['user' => $user])}}" method="post">
        @csrf
        <h1>Edit User</h1>
        <p>User Name:</p>
        <input type="text" name="username_edit" id="" value="{{$user->username}}">
        <p>User Title:</p>
        <input type="text" name="usertitle_edit" id="" value="{{$user->usertitle}}">
        <p>Password:</p>
        <input type="text" name="password_edit" id="">
        <br>
        <br>
        <button type="submit">Edit</button>
    </form>
</div>
</body>
</html>
