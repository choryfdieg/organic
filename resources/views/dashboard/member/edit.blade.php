@extends('dashboard.master')

@section('content')

    @include('dashboard.partials.validation-error')

    <form action="{{ route("member.update", $member->id) }}" method="POST">
        @method('PUT')
        @include('dashboard.member._form')
    </form>    

@endsection

