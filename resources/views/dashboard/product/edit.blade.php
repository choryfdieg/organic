@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("product.update", $product->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.product._form')
    </form>

@endsection

