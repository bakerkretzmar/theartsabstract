@extends('app')

@section('content')

    @include('partials.archive-header')

    @if(! have_posts())

        <p class="text-2xl my-12 mx-auto text-center">
            {{ __('Bummer, there’s nothing here.', 'theartsabstract') }}
        </p>

        @include('partials.searchform')

    @endif

    @include('partials.posts-grid')

@endsection
