@extends('layouts.app')

@section('content')
    @while(have_posts())
        @php(the_post())
        @include('partials.page-header')
        <article class="editor-content container max-w-3xl my-8 space-y-6 font-serif text-xl leading-relaxed">
            {{ the_content() }}
        </article>
    @endwhile
@endsection
