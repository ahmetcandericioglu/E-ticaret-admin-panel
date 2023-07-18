<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-ticaret-categorylist</title>
</head>
<body>
<header>
    <a href="{{route('home')}}">Home</a>
    <a href="{{route('user')}}">User</a>
    <a href="{{route('category')}}">Category</a>
</header>
<div>
    <h1>Categories</h1>
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
</div>
</body>
</html>
