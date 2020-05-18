@extends('admin.app')
@section('title')Admin CreateUsers @endsection
@section('content')
    <h3>CreateUser</h3>
    @if(count($errors)>0)
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
{!! Form::open(['action' => 'Admin\AdminUserController@store', 'method' => 'POST', 'files' => true]) !!}
	{!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null) !!}
    <br>
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email', null) !!}
    <br>
    {!! Form::label('roles', 'Roles') !!}
    {!! Form::select('roles[]', $roles, null,['multiple' => 'multiple']) !!}
    <br>
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', [1=>'Active', 0=>'Inactive'], 0) !!}
    <br>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null) !!}
    <br>
    {!! Form::label('avatar', 'User Pic') !!}
    {!! Form::file('avatar', null) !!}
    <br>
    {!! Form::submit('Submit') !!}
{!! Form::close() !!}
@endsection
