@extends('layouts.app')

@section('content')
    @include('partials.archive-header')

    @if (! have_posts())
        <p class="text-2xl py-12 mx-auto text-center">
            {{ __('Search harder!', 'theartsabstract') }}
        </p>
        @include('forms.search')
    @endif

    @include('partials.posts-grid')
@endsection
