@extends('app')

@section('content')

    @while(have_posts())

        {{ the_post() }}

        @include('partials.page-header')

        <article class="container content my-8">

            {{ the_content() }}

        </article>

    @endwhile

@endsection
