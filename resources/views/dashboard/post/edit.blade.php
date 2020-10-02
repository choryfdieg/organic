@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("post.update", $post->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.post._form')
    </form>

    <br>

    <form action="{{ route("post.image", $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="image">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>

<div class="row mt-3">
    @foreach ($post->images as $image)
        <div class="col-3">
            <img src="{{$image->getImageUrl()}}" alt="" class="w-100">
            <a href="{{route("post.image-download", $image->id)}}" class=" float-left btn btn-success btn-sm m-2">Descargar</a>

            <form action="{{route('post.image-delete', $image->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger float-left btn-sm m-2">Eliminar</button>
            </form>

        </div>
        
    @endforeach

</div>

@endsection

