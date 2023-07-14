<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-register</title>
</head>

<body>

<header>
    <a href="{{route('home')}}">Home</a>
</header>
<div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('register_user')}}" method="post">
        @csrf
        <h1>Register</h1>
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
</div>

</body>
</html>
