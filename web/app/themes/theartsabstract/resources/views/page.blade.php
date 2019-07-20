@extends('app')

@section('content')

    @while(have_posts())

        {{ the_post() }}

        @include('page-header')

        <article class="container content my-8">

            {{ the_content() }}

        </article>

        {{-- {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'theartsabstract'), 'after' => '</p></nav>']) !!} --}}

    @endwhile

@endsection
