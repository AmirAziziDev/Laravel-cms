@extends('admin.app')
@section('title')Admin Category @endsection
@section('content')
    <h3>Categories</h3>
    @if(Session::has('delete_category'))
        <div class="alert alert-danger">
            <div>{{session('delete_category')}}</div>
        </div>
    @endif
    @if(Session::has('add_category'))
        <div class="alert alert-success">
            <div>{{session('add_category')}}</div>
        </div>
    @endif
    @if(Session::has('update_category'))
        <div class="alert alert-success">
            <div>{{session('update_category')}}</div>
        </div>
    @endif
        <table class="table">
            <thead>
            <tr>
                <th>Category Title</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td><a href="{{route('categories.edit', $category->id)}}">{{$category->title}}</a></td>
                    <td>{{$category->created_at}}</td>
                </tr>
             @endforeach
            </tbody>
        </table>
@endsection
