@extends('layout.categoryLayout')
@section('content')
    <h3>Category Add</h3>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    @endif
    <form action="{{route('add_new_category')}}" method="post">
        @csrf
        <p>Category Title:</p>
        <input type="text" name="categorytitle" id="">
        <p>Category Description:</p>
        <input type="text" name="categorydescription" id="">
        <p>Category Status:</p>
        <input type="text" name="categorystatus" id="">
        <br>
        <br>
        <button type="submit">Add</button>
    </form>
@endsection
