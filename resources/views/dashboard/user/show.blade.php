@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="name">Name</label>
    <input readonly type="text" name="name" class="form-control" value="{{$user->name}}">            
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input readonly type="email" name="email" class="form-control"  value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label for="rol">Rol</label>
        <input readonly type="rol" name="rol" class="form-control"  value="{{$user->rol->key}}">
    </div>


@endsection

