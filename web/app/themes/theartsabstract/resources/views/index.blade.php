@extends('layouts.app')

@section('content')
    @include('partials.page-header')

    @if (! have_posts())
        <p class="text-2xl py-12 mx-auto text-center">
            {{ __('Search harder!', 'theartsabstract') }}
        </p>
        @include('forms.search')
    @endif

    @while(have_posts())
        @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
@endsection
