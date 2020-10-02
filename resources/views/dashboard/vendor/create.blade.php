@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("vendor.store") }}" method="POST">
        @include('dashboard.vendor._form')
    </form>

@endsection

