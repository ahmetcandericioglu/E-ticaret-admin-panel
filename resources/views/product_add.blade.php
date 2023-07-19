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
<h1>Product</h1>
<form action="{{route('add_new_product')}}" method="post">
    @csrf
    <p>Product Title:</p>
    <input type="text" name="producttitle" id="">
    <p>Product Category Id:</p>
    <select name="productcategoryid" id="products">
        <option value="{{null}}" selected>Null</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->id." -> ".$category->categorytitle}}</option>
        @endforeach
    </select>
    <p>Barcode:</p>
    <input type="text" name="barcode" id="">
    <p>Product Status:</p>
    <input type="text" name="productstatus" id="">
    <br>
    <br>
    <button type="submit">Add</button>
</form>

</body>
</html>
