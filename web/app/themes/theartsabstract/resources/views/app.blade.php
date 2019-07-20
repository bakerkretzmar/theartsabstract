<!doctype html>
<html {!! get_language_attributes() !!}>

    @include('partials.head')

    <body {{ body_class(['flex', 'flex-col', 'min-h-screen']) }}>

        {{ do_action('get_header') }}

        @include('header')

        <main class="flex-grow">

            @yield('content')

        </main>

        @if (App\display_sidebar())
            <aside class="sidebar">
                @include('partials.sidebar')
            </aside>
        @endif

        @php do_action('get_footer') @endphp

        @include('footer')

        @php wp_footer() @endphp

    </body>

</html>
