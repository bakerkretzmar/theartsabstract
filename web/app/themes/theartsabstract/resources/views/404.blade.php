@extends('app')

@section('content')

    @include('partials.page-header')

    @if(! have_posts())

        <h4 class="text-4xl lg:text-5xl mb-12">
            {{ __('Nope', 'theartsabstract') }}
        </h4>

        <img src="@asset('/img/404.gif')" class="w-1/2 mb-8">

        <p>
            {{ __('There’s nothing here for you but', 'theartsabstract') }} <a href="https://www.facebook.com/media/set/?set=a.537190639797340.1073741838.107265476123194&type=1&l=92124e3858">{{ __('stale memories', 'theartsabstract') }}</a>.
        </p>

    @endif

@endsection
