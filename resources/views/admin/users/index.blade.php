@extends('admin.app')
@section('title')Admin ShowUsers @endsection
@section('content')
    <h3>Users</h3>
    @if(Session::has('delete_user'))
        <div class="alert alert-danger">
            <div>{{session('delete_user')}}</div>
        </div>
    @endif
    @if(Session::has('add_user'))
        <div class="alert alert-success">
            <div>{{session('add_user')}}</div>
        </div>
    @endif
    @if(Session::has('update_user'))
        <div class="alert alert-success">
            <div>{{session('update_user')}}</div>
        </div>
    @endif

    <div class="row">
        @foreach($users as $user)
            <div class="col-md-5 border border-primary m-3 p-2">
                <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400" }}" alt="" width="100" height="100" class="border border-primary">
                <h3><b>Name:</b> <a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></h3>
                <h5><b>E-mail:</b> {{$user->email}}</h5>
                <h5><b>Created At:</b> {{$user->created_at}}</h5>
                <h5><b>Status:</b> @if ($user->status == 0) Inactive @else Active @endif</h5>
                <h5><b>Roles:</b> @foreach($user->roles as $role)
                        {{$role->name}}
                    @endforeach
                </h5>
            </div>
        @endforeach
    </div>

@endsection
