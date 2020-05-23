@extends('admin.app')
@section('title')Admin EditPost @endsection
@section('content')
    <h3>EditPost</h3>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($post, ['action' => ['Admin\AdminPostController@update', $post->id], 'method' => 'PATCH', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category', $categories, $post->category->id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', [1 => 'active', 0 => 'inactive'], null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('photo', 'Photo') !!}
    {!! Form::file('photo', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('meta_description', 'Meta Description') !!}
    {!! Form::textarea('meta_description', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('meta_keywords', 'Meta Keywords') !!}
    {!! Form::textarea('meta_keywords', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminPostController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
@endsection
