@csrf

<div class="form-group">
    <label for="title">Titulo</label>
<input type="text" name="title" class="form-control" value="{{old('title', $post->title)}}">            
</div>

<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input type="text" name="url_clean" class="form-control"  value="{{old('url_clean', $post->url_clean)}}">
</div>

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select type="text" name="category_id" class="form-control"  value="{{old('category_id', $post->category_id)}}">
        @foreach ($categories as $id => $title)
            <option {{($post->category_id == $id) ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="posted">Publicado</label>
    <select type="text" name="posted" class="form-control"  value="{{old('posted', $post->posted)}}">
        @include('dashboard.partials.option-yes-not', ['value' => $post->posted])
    </select>
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content', $post->content)}}</textarea>
</div>

<input type="submit" value="Enviar" class="btn btn-primary">

