@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("product.store") }}" method="POST">
        @include('dashboard.product._form')
    </form>

@endsection

