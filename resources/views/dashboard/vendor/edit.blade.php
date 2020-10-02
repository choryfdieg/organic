@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("vendor.update", $vendor->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.vendor._form')
    </form> 
    
    <br>

    <div class="row m-3">
        <form action="{{ route("vendor.image", $vendor) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="file" name="image">
                </div>
                <div class="col">
                    <input type="submit" class="btn btn-success" value="Subir imagen">
                </div>
            </div>
        </form>
    </div>

    <div class="row mt-3">

        <div class="card-group">

        @foreach ($vendor->images as $image)

            <div class="card m-1" style="width: 10rem;">
                <img class="card-img-top" src="{{$image->getImageUrl()}}" alt="Card image cap">
                <div class="card-body">
                    <a href="{{route("vendor.image-download", $image->id)}}" class=" float-left btn btn-success btn-sm m-2">Descargar</a>
                    <form action="{{route('vendor.image-delete', $image->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger float-left btn-sm m-2">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach

        </div>

    </div>

@endsection

