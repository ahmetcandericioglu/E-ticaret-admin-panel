<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-userlist</title>
</head>
<body>
<div>
    <h1>Users</h1>
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
                    <td><input type="checkbox" name="selected" id=""></td>
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
</div>
</body>
</html>
