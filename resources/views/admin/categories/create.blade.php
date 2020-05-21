@extends('admin.app')
@section('title')Admin CreateCategory @endsection
@section('content')
    <h3>Create Category</h3>
    @if(count($errors)>0)
        <ul style="color: red">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open(['action' => 'Admin\AdminCategoryController@store', 'method' => 'POST']) !!}
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null) !!}
    <br>
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null) !!}
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
