@extends('admin.app')
@section('title')Admin ShowUsers @endsection
@section('content')
    <h3>Users</h3>
<ul>
@foreach($users as $user)
<li>
    <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400" }}" alt="" width="80">
    {{$user->name}} --
    {{$user->email}}  --
    {{$user->created_at}} --
    @if ($user->status == 0) Inactive @else Active @endif --
    @foreach($user->roles as $role)
       #{{$role->name}}
    @endforeach
</li>
@endforeach
</ul>
@endsection
