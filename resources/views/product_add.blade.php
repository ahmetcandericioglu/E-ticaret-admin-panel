<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-addproduct</title>
</head>
<body>

<header>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('user')}}">User</a>
    <a href="{{route('category')}}">Category</a>
    <a href="{{route('product')}}">Product</a>
</header>
@if($errors->any())
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
@endif
<h1>Category</h1>
<form action="{{route('add_new_category')}}" method="post">
    @csrf
    <p>Category Title:</p>
    <input type="text" name="categorytitle" id="">
    <p>Category Description:</p>
    <input type="text" name="categorydescription" id="">
    <p>Category Status:</p>
    <input type="text" name="categorystatus" id="">
    <br>
    <br>
    <button type="submit">Add</button>
</form>

</body>
</html>
