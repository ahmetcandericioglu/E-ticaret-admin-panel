@extends('layout.master')
@section('header')
    Product List
@endsection
@section('title')
    Product-List
@endsection
@section('content')
    <form action="{{route('delete_products')}}" method="post" onsubmit=" return confirm('Are You Sure?')">
        @csrf
        <div>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th class="pr-5">Choose</th>
                    <th class="pr-5">Product Title</th>
                    <th class="pr-5">Product Category Id</th>
                    <th class="pr-5">Barcode</th>
                    <th class="pr-5">Product Status</th>
                    <th class="pr-5">Edit</th>
                    <th class="pr-5">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox" name="selectedids[{{$product->id}}]" id=""
                                   value="{{$product->id}}">
                        </td>
                        <td>{{$product->producttitle}}</td>
                        <td>{{$product->productcategoryid}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>{{$product->productstatus}}</td>
                        <td><a class="btn btn-secondary w-100" href="{{route('edit_product',['product' => $product])}}">düzenle</a></td>
                        <td><a class="btn btn-danger w-100" href="{{route('delete_product',['product' => $product])}}">sil</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit">Delete Selected</button>
        </div>
    </form>

@endsection
