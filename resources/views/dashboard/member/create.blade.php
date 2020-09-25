@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("member.store") }}" method="POST">
        @include('dashboard.member._form')
    </form>

@endsection

