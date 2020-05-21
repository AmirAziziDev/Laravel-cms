@extends('admin.app')
@section('title')Admin ShowUsers @endsection
@section('content')
    <h3>Users</h3>
    @if(Session::has('delete_user'))
        <div>
            <div>{{session('delete_user')}}</div>
        </div>
    @endif
    @if(Session::has('add_user'))
        <div>
            <div>{{session('add_user')}}</div>
        </div>
    @endif
    @if(Session::has('update_user'))
        <div>
            <div>{{session('update_user')}}</div>
        </div>
    @endif
<ul>
@foreach($users as $user)
<li>
    <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400" }}" alt="" width="80">
    <a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a> --
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
