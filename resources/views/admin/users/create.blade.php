@extends('admin.app')
@section('title')Admin CreateUsers @endsection
@section('content')
    <h3>CreateUser</h3>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
{!! Form::open(['action' => 'Admin\AdminUserController@store', 'method' => 'POST', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('roles', 'Roles') !!}
        {!! Form::select('roles[]', $roles, null,['multiple' => 'multiple','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status', [1=>'Active', 0=>'Inactive'], null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('avatar', 'User Pic') !!}
        {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Submit', ['class'=>'btn btn-success']) !!}
    </div>
{!! Form::close() !!}
@endsection
