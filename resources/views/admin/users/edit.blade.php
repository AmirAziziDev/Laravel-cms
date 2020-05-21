@extends('admin.app')
@section('title')Admin EditUser @endsection
@section('content')
    <h3>EditUser-> {{$user->name}}</h3>
    @if(count($errors)>0)
        <ul style="color: red">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400" }}" alt="" width="80">
    <br>
    {!! Form::model($user, ['action' => ['Admin\AdminUserController@update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}
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
    {!! Form::select('status', [1=>'Active', 0=>'Inactive'], null) !!}
    <br>
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null) !!}
    <br>
    {!! Form::label('avatar', 'User Pic') !!}
    {!! Form::file('avatar', null) !!}
    <br>
    {!! Form::submit('Submit') !!}
    {!! Form::close() !!}
    <br>
    {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminUserController@destroy', $user->id]]) !!}
    {!! Form::submit('DELETE') !!}
    {!! Form::close() !!}
@endsection
