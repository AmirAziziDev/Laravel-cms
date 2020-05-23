@extends('admin.app')
@section('title')Admin CreateCategory @endsection
@section('content')
    <h3>Create Category</h3>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(['action' => 'Admin\AdminCategoryController@store', 'method' => 'POST']) !!}
    <div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
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
@endsection
