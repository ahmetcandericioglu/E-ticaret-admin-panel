@extends('layout.master')
@section('header')
    Category List
@endsection
@section('title')
    Category-List
@endsection
@section('content')
    <form action="{{route('delete_categories')}}" method="post" onsubmit=" return confirm('Are You Sure?') ">
        @csrf
        <div>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th class="pr-5">Choose</th>
                    <th class="pr-5">Category Title</th>
                    <th class="pr-5">Category Description</th>
                    <th class="pr-5">Category Status</th>
                    <th class="pr-5">Edit</th>
                    <th class="pr-5">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><input type="checkbox" name="selectedids[{{$category->id}}]" id=""
                                   value="{{$category->id}}"></td>
                        <td>{{$category->categorytitle}}</td>
                        <td>{{$category->categorydescription}}</td>
                        <td>{{$category->categorystatus}}</td>
                        <td><a class="btn btn-secondary w-100"
                               href="{{route('edit_category',['category' => $category])}}">düzenle</a></td>
                        <td><a class="btn btn-danger w-100"
                               href="{{route('delete_category',['category' => $category])}}">sil</a></td>
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
