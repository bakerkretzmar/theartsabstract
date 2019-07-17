<!doctype html>
<html {!! get_language_attributes() !!}>

    @include('partials.head')

    <body @php body_class() @endphp>

        @php do_action('get_header') @endphp

        @include('header')

        <div class="wrap container" role="document">

            <div class="content">

                <main class="main">

                        @while(have_posts())

                            @php the_post() @endphp

                            {{ FrontPage::post_title() }}

                            {{ FrontPage::post_subtitle() }}

                            {{ FrontPage::post_thumbnail() }}

                            {{-- @php the_title() @endphp --}}

                        @endwhile

                </main>

            </div>

        </div>

        @php do_action('get_footer') @endphp

        @include('partials.footer')

        @php wp_footer() @endphp

    </body>

</html>
