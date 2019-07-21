<!doctype html>
<html {!! get_language_attributes() !!}>

    @include('partials.head')

    <body {{ body_class(['flex', 'flex-col', 'min-h-screen']) }}>

        {{ do_action('get_header') }}

        @include('partials.header')

        <main class="flex-grow">

            @yield('content')

        </main>

        {{ do_action('get_footer') }}

        @include('partials.footer')

        {{ wp_footer() }}

    </body>

</html>
