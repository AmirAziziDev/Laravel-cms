@extends('admin.app')
@section('title')Admin ShowPosts @endsection
@section('content')
    <h3>Posts</h3>
    @if(Session::has('delete_category'))
        <div>
            <div>{{session('delete_category')}}</div>
        </div>
    @endif
    @if(Session::has('add_category'))
        <div>
            <div>{{session('add_category')}}</div>
        </div>
    @endif
    @if(Session::has('update_category'))
        <div>
            <div>{{session('update_category')}}</div>
        </div>
    @endif
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{route('categories.edit', $category->id)}}">{{$category->title}}</a> --
                {{$category->created_at}}
            </li>
        @endforeach
    </ul>
@endsection
