@extends('layouts.app')

@section('content')
    @if (! have_posts())
        <article class="container py-8 space-y-12">
            <h1 class="text-4xl lg:text-5xl text-center font-bold uppercase">
                {{ __('Nope', 'theartsabstract') }}
            </h1>
            <img src="@asset('images/404.gif')" class="w-3/5 mx-auto" />
            <p class="text-center">
                {{ __('There’s nothing here for you but', 'theartsabstract') }} <a href="https://www.facebook.com/media/set/?set=a.537190639797340.1073741838.107265476123194&type=1&l=92124e3858" class="link">{{ __('stale memories', 'theartsabstract') }}</a>.
            </p>
        </article>
    @endif
@endsection
