<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-login</title>
</head>
<body>
<div>
    <h1>Login</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('login')}}" method="post">
        @csrf
        <p>Username:</p>
        <input type="text" name="username" id="name">
        <p>Password:</p>
        <input type="password" name="password" id="pass">
        <br>
        <br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
