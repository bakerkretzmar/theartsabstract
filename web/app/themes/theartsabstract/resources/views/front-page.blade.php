<!doctype html>
<html {!! get_language_attributes() !!}>

    @include('partials.head')

    <body {{ body_class(['flex', 'flex-col', 'min-h-screen']) }}>

        @php do_action('get_header') @endphp

        @include('header')

        <main class="front-page-grid">

            @while(have_posts())

                {{ the_post() }}

                <div class="aspect-ratio-golden">

                    <a href="{{ FrontPage::post_permalink() }}" class="group aspect-ratio relative block overflow-hidden">

                        {{ FrontPage::post_thumbnail([
                            'class' => 'w-full h-full object-cover object-center',
                        ]) }}

                        <div class="absolute inset-0 flex flex-col items-center justify-center o-2 opacity-0 group-hover:opacity-100 group-focus:opacity-100 bg-white-75 transition-200">

                            <h2 class="w-5/6 text-3xl font-bold text-center leading-tight uppercase">
                                {{ FrontPage::post_title() }}
                            </h2>

                            <h4 class="w-5/6 text-xl font-bold text-center text-grey-800 leading-tight">
                                {{ FrontPage::post_subtitle() }}
                            </h4>

                        </div>

                    </a>

                </div>

            @endwhile

        </main>

        @php do_action('get_footer') @endphp

        @include('footer')

        @php wp_footer() @endphp

    </body>

</html>
