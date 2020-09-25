@extends('dashboard.master')

@section('content')

    <div class="form-group">
        <label for="title">Titulo</label>
        <input readonly type="text" name="title" class="form-control" value="{{$member->title}}">            
    </div>

    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input readonly type="text" name="url_clean" class="form-control"  value="{{$member->url_clean}}">
    </div>

    <div class="form-group">
        <label for="phone">Telefono</label>
        <input readonly type="text" name="phone" class="form-control" value="{{$member->phone}}">            
    </div>

    <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input readonly type="text" name="email" class="form-control" value="{{$member->email}}">            
    </div>

    <div class="form-group">
        <label for="posted">Publicado</label>
        <select readonly type="text" name="posted" class="form-control"  value="{{old('posted', $member->posted)}}">
            @include('dashboard.partials.option-yes-not', ['value' => $member->posted])
        </select>
    </div>

    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea readonly name="description" id="content" cols="30" rows="10" class="form-control">{{$member->description}}</textarea>
    </div>

    


@endsection

