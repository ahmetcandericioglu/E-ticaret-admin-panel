@extends('layout.categoryLayout')
@section('content')
    <h3>Category Edit</h3>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{route('edit_category', ['category' => $category])}}" method="post">
        @csrf
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
@endsection
