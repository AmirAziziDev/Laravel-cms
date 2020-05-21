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
    {!! Form::model($category,['action' => ['Admin\AdminCategoryController@update', $category->id], 'method' => 'PATCH']) !!}
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
    {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminCategoryController@destroy', $category->id]]) !!}
    {!! Form::submit('DELETE') !!}
    {!! Form::close() !!}
@endsection
