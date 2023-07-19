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
    <form action="{{route('delete_product', ['product' => $product])}}" method="post" onsubmit="return confirm('Are you sure?')">
        @csrf
        <h1>Delete Product</h1>
        <p>Product Title: {{$product->producttitle}}</p>
        <p>Product Category Id: {{$product->productcategoryid}}</p>
        <p>Barcode: {{$product->barcode}}</p>
        <p>Product Status: {{$product->productstatus}}</p>
        <button type="submit">Delete</button>
    </form>
</div>

</body>
</html>
