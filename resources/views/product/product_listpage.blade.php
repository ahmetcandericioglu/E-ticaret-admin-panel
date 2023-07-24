@extends('layout.master')
@section('header')
    Product List
@endsection
@section('content')
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
@endsection
