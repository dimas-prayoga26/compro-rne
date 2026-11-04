@extends('main')

@section('content')
    @include('page-main.hero')
    @include('page-main.about')
    @include('page-main.product')
    @include('page-main.layanan')
    @include('page-main.location')
    @include('page-main.gallery')
    {{-- @include('page-main.news') --}}
    @include('page-main.company')
@endsection
