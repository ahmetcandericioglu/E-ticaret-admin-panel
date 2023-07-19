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
    <form action="{{route('edit_product', ['product' => $product])}}" method="post">
        @csrf
        <h1>Edit Product</h1>
        <p>Product Title:</p>
        <input type="text" name="producttitle" id="" value="{{$product->producttitle}}">
        <p>Product Category Id:</p>
        <select name="productcategoryid">
            <option value="{{null}}" selected>Null</option>
            @foreach($categories as $category)
                <option>{{$category->id." -> ". $category->categorytitle}}</option>
            @endforeach
        </select>

        <p>Barcode:</p>
        <input type="text" name="barcode_edit" id="" value="{{$product->barcode}}">
        <p>Product Status:</p>
        <input type="text" name="productstatus_edit" id="" value="{{$product->productstatus}}">
        <br>
        <br>
        <button type="submit">Edit</button>
    </form>
</div>
</body>
</html>
