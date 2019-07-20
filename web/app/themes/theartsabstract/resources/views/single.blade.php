@extends('app')

@section('content')

    @while(have_posts())

        {{ the_post() }}

        @include('content-single-'.get_post_type())

    @endwhile

@endsection
