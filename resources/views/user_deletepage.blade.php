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
</header>
@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
<div>
    <form action="{{route('delete_user', ['user' => $user])}}" method="post">
        @csrf
        <h1>Edit User</h1>
        <p>User Name:</p>
        <input type="text" name="username_edit" id="" value="{{$user->username}}">
        <p>User Title:</p>
        <input type="text" name="usertitle_edit" id="" value="{{$user->usertitle}}">
        <br>
        <br>
        <button type="submit">Delete</button>
    </form>
</div>
</body>
</html>
