@extends('admin.app')
@section('title')Admin CreatePost @endsection
@section('content')
    <h3>CreatePost</h3>
    @if(count($errors)>0)
        <ul style="color: red">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($post, ['action' => ['Admin\AdminPostController@update', $post->id], 'method' => 'PATCH', 'files' => true]) !!}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', $post->title) !!}
    <br>
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null) !!}
    <br>
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category', $categories, $post->category->id) !!}
    <br>
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null) !!}
    <br>
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', [1 => 'active', 0 => 'inactive'], null) !!}
    <br>
    {!! Form::label('photo', 'Photo') !!}
    {!! Form::file('photo', null) !!}
    <br>
    {!! Form::label('meta_description', 'Meta Description') !!}
    {!! Form::textarea('meta_description', null) !!}
    <br>
    {!! Form::label('meta_keywords', 'Meta Keywords') !!}
    {!! Form::textarea('meta_keywords', null) !!}
    <br>
    {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminPostController@destroy', $post->id]]) !!}
        {!! Form::submit('DELETE') !!}
    {!! Form::close() !!}
@endsection
