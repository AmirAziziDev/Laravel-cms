@extends('admin.app')
@section('title')Admin ShowPosts @endsection
@section('content')
    <h3>Posts</h3>
    @if(Session::has('update_post'))
        <div>
            <div>{{session('update_post')}}</div>
        </div>
    @endif
    @if(Session::has('add_post'))
        <div>
            <div>{{session('add_post')}}</div>
        </div>
    @endif
    @if(Session::has('delete_post'))
        <div>
            <div>{{session('delete_post')}}</div>
        </div>
    @endif
    <ul>
        @foreach($posts as $post)
            <li>
                <img src="{{$post->photo ? $post->photo->path : "http://www.placehold.it/400" }}" alt="" width="80">
                <a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a> --
                {{Str::limit($post->description,25)}}  --
                {{$post->category->title}} --
                @if ($post->status == 0) Inactive @else Active @endif --
                {{$post->created_at}}
            </li>
        @endforeach
    </ul>
@endsection
