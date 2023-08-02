@extends('layout.master')
@section('header')
    User List
@endsection

@section('title')User-List
@endsection
@section('content')
    <form class="" action="{{route('delete_users')}}" method="post" onsubmit=" return confirm('Are You Sure?') ">
        @csrf
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th class="pr-5" scope="col">Choose</th>
                <th class="pr-5" scope="col">User Title</th>
                <th class="pr-5" scope="col">User Name</th>
                <th class="pr-5" scope="col">Edit</th>
                <th class="pr-5" scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name="selectedids[{{$user->id}}]" id="" value="{{$user->id}}"></td>
                    <td>{{$user->usertitle}}</td>
                    <td>{{$user->username}}</td>
                    <td><a class="btn btn-secondary w-100" href="{{route('edit',['user' => $user])}}">düzenle</a></td>
                    <td><a class="btn btn-danger w-100" href="{{route('delete',['user' => $user])}}">sil</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" type="submit">Delete Selected</button>
        </div>
    </form>

@endsection
