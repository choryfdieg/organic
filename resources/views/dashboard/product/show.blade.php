@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title">Titulo</label>
    <input readonly type="text" name="title" class="form-control" value="{{$post->title}}">            
    </div>

    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$post->url_clean}}">
    </div>

    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select readonly type="text" name="category_id" class="form-control"  value="{{old('category_id', $post->category_id)}}">
            @foreach ($categories as $id => $title)
                <option {{($post->category_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="posted">Publicado</label>
        <select readonly type="text" name="posted" class="form-control"  value="{{old('posted', $post->posted)}}">
            @include('dashboard.partials.option-yes-not', ['value' => $post->posted])
        </select>
    </div>

    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea readonly name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
    </div>

    


@endsection

