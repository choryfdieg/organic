@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title">Title</label>
    <input readonly type="text" name="title" class="form-control" value="{{$postComment->title}}">            
    </div>

    <div class="form-group">
        <label for="url_clean">User</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$postComment->user_id}}">
    </div>

    <div class="form-group">
        <label for="url_clean">Post</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$postComment->post_id}}">
    </div>

    <div class="form-group">
        <label for="content">Comment</label>
        <textarea readonly name="content" cols="30" rows="10" class="form-control">{{$postComment->comment}}</textarea>
    </div>
    


@endsection

