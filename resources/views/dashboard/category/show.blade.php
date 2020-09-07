
@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title">Titulo</label>
        <input readonly type="text" name="title" class="form-control" value="{{old('title', $category->title)}}">            
    </div>

    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{old('url_clean', $category->url_clean)}}">
    </div>

@endsection