@extends('admin.app')
@section('title')Admin ShowPosts @endsection
@section('content')
    <h3>Posts</h3>
    @if(Session::has('update_post'))
        <div class="alert alert-success">
            <div>{{session('update_post')}}</div>
        </div>
    @endif
    @if(Session::has('add_post'))
        <div class="alert alert-success">
            <div>{{session('add_post')}}</div>
        </div>
    @endif
    @if(Session::has('delete_post'))
        <div class="alert alert-danger">
            <div>{{session('delete_post')}}</div>
        </div>
    @endif

            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Category</th>
                        <th>Post Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/400" }}" alt="" width="80"></td>
                        <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{Str::limit($post->description,25)}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>@if ($post->status == 0) <span class="badge badge-danger p-2">Inactive</span> @else <span class="badge badge-primary p-2">Active</span> @endif</td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

    @endsection
