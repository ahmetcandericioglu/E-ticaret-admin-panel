@extends('layout.master')
@section('header')
    Category List
@endsection
@section('content')
    <form action="{{route('delete_categories')}}" method="post" onsubmit=" return confirm('Are You Sure?') " >
        @csrf
        <div>
            <table>
                <thead>
                <tr>
                    <th>Choose</th>
                    <th>Category Title</th>
                    <th>Category Description</th>
                    <th>Category Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><input type="checkbox" name="selectedids[{{$category->id}}]" id="" value="{{$category->id}}"></td>
                        <td>{{$category->categorytitle}}</td>
                        <td>{{$category->categorydescription}}</td>
                        <td>{{$category->categorystatus}}</td>
                        <td><a href="{{route('edit_category',['category' => $category])}}">düzenle</a></td>
                        <td><a href="{{route('delete_category',['category' => $category])}}">sil</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit">Delete Selected</button>
    </form>
@endsection
