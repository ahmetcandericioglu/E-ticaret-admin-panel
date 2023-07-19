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
<div>
    <h1>Products</h1>
    <form action="{{route('delete_products')}}" method="post" onsubmit=" return confirm('Are You Sure?')">
        @csrf
        <div>
            <table>
                <thead>
                <tr>
                    <th>Choose</th>
                    <th>Product Title</th>
                    <th>Product Category Id</th>
                    <th>Barcode</th>
                    <th>Product Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox" name="selectedids[{{$product->id}}]" id="" value="{{$product->id}}">
                        </td>
                        <td>{{$product->producttitle}}</td>
                        <td>{{$product->productcategoryid}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->productstatus}}</td>
                        <td><a href="{{route('edit_product',['product' => $product])}}">düzenle</a></td>
                        <td><a href="{{route('delete_product',['product' => $product])}}">sil</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit">Delete Selected</button>
    </form>
</div>
</body>
</html>
