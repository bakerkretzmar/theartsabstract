<article {{ post_class() }}>

    <div class="relative w-full h-fill">

        {{ the_post_thumbnail('full', [
            'class' => 'w-full h-full object-cover object-center'
        ]) }}

        @if($post_thumbnail_caption)
            <p class="absolute right-0 bottom-0 px-2 py-1 text-xs text-white bg-black-75">
                {{ $post_thumbnail_caption }}
            </p>
        @endif

    </div>

    <header class="container max-w-3xl mt-6">

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
            {{ get_the_title() }}
        </h1>

        @include('partials.entry-meta')

    </header>

    <section class="container content my-8">

        {{ the_content() }}

    </section>

    <p class="text-3xl text-center">~</p>

    <footer class="pagination-links container max-w-3xl flex flex-col sm:flex-row justify-between my-8 o-6 sm:o-0">

        <p class="flex items-center sm:w-1/2 pr-2 oh-4">
            <span>←</span>
            <span>{{ previous_post_link('%link') }}</span>
        </p>

        <p class="flex items-center self-end justify-end sm:w-1/2 pl-2 oh-4 text-right">
            <span>{{ next_post_link('%link') }}</span>
            <span>→</span>
        </p>

    </footer>

    <p class="text-3xl text-center mb-8">~</p>

</article>
