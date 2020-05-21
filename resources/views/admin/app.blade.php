<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
<ul>
    <li><a href="{{route('welcome')}}">Home</a></li>
    <li><a href="{{route('users.index')}}">Users</a></li>
    <li><a href="{{route('users.create')}}">Creat User</a></li>
    <li><a href="{{route('posts.index')}}">Posts</a></li>
    <li><a href="{{route('posts.create')}}">Create Post</a></li>
    <li><a href="{{route('categories.index')}}">Categories</a></li>
    <li><a href="{{route('categories.create')}}">Create Category</a></li>
</ul>
<hr>
@yield('content')
</body>
</html>
