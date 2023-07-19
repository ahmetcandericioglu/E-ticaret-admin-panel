<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <li>{{ $error }}</li>
    @endforeach
@endif
<div>
    <form action="{{route('edit_category', ['category' => $category])}}" method="post">
        @csrf
        <h1>Edit Category</h1>
        <p>Category Title:</p>
        <input type="text" name="categorytitle" id="" value="{{$category->categorytitle}}">
        <p>Category Description:</p>
        <input type="text" name="categorydescription_edit" id="" value="{{$category->categorydescription}}">
        <p>Category Status:</p>
        <input type="text" name="categorystatus_edit" id="" value="{{$category->categorystatus}}">
        <br>
        <br>
        <button type="submit">Edit</button>
    </form>
</div>
</body>
</html>
