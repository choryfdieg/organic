@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title">Name</label>
    <input readonly type="text" name="title" class="form-control" value="{{$contact->name}}">            
    </div>

    <div class="form-group">
        <label for="url_clean">Email</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$contact->email}}">
    </div>

    <div class="form-group">
        <label for="url_clean">Phone</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$contact->phone}}">
    </div>

    <div class="form-group">
        <label for="content">Message</label>
        <textarea readonly name="content" cols="30" rows="10" class="form-control">{{$contact->message}}</textarea>
    </div>
    


@endsection

