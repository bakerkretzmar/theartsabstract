@extends('app')

@section('content')

    @include('partials.page-header')

    @if(! have_posts())

        <p class="text-2xl my-12 mx-auto text-center">
            {{ __('Search harder!', 'theartsabstract') }}
        </p>

        @include('partials.searchform')

    @endif

    @while(have_posts())

        {{ the_post() }}

        @include('partials.content-'.get_post_type())

    @endwhile

@endsection
