<!doctype html>
<html {!! get_language_attributes() !!}>

    @include('partials.head')

    <body @php body_class() @endphp>

        @php do_action('get_header') @endphp

        @include('header')

        <div class="wrap" role="document">

            <div class="content">

                <main class="front-page-grid">

                    @while(have_posts())

                        {{ the_post() }}

                        <div class="ar-golden">

                            <div class="ar front-page-grid-item relative overflow-hidden">

                                {{ FrontPage::post_thumbnail([
                                    'class' => 'w-full h-full object-cover object-center',
                                ]) }}

                                <div class="absolute inset-0 bg-white opacity-25"></div>

                                <div class="absolute inset-0 flex flex-col">

                                    <h2 class="font-bold">
                                        {{ FrontPage::post_title() }}
                                    </h2>

                                    {{ FrontPage::post_subtitle() }}

                                </div>

                            </div>

                        </div>

                    @endwhile

                </main>

            </div>

        </div>

        @php do_action('get_footer') @endphp

        @include('partials.footer')

        @php wp_footer() @endphp

    </body>

</html>
