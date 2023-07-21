@extends('layout.userLayout')
@section('content')
    <h3>User List</h3>
    <form action="{{route('delete_users')}}" method="post" onsubmit=" return confirm('Are You Sure?') " >
        @csrf
        <div>
            <table>
                <thead>
                <tr>
                    <th>Choose</th>
                    <th>User Title</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox" name="selectedids[{{$user->id}}]" id="" value="{{$user->id}}"></td>
                        <td>{{$user->usertitle}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->password}}</td>
                        <td><a href="{{route('edit',['user' => $user])}}">düzenle</a></td>
                        <td><a href="{{route('delete',['user' => $user])}}">sil</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <button type="submit">Delete Selected</button>
    </form>
@endsection
