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
    <a href="{{route('product')}}">Product</a>
</header>

<div>
    <form action="{{route('delete_category', ['category' => $category])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <h1>Delete Category</h1>
        <p>Category Title: {{$category->categorytitle}}</p>
        <p>Category Description: {{$category->categorydescription}}</p>
        <p>Category Status: {{$category->categorystatus}}</p>
        <button type="submit">Delete</button>
    </form>
</div>

</body>
</html>
