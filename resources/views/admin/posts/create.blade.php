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
    {!! Form::open(['action' => 'Admin\AdminPostController@store', 'method' => 'POST', 'files' => true]) !!}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null) !!}
    <br>
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null) !!}
    <br>
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category', $categories, null) !!}
    <br>
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null) !!}
    <br>
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', [1 => 'active', 0 => 'inactive'], 0) !!}
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
@endsection
