<article {{ post_class() }}>

    <div class="relative w-full h-fill">

        {{ Single::post_thumbnail(['class' => 'w-full h-full object-cover object-center']) }}

        <p class="absolute right-0 bottom-0 px-2 py-1 text-xs text-white bg-black-75">
            {{ Single::post_thumbnail_caption() }}
        </p>

    </div>

    <header class="container max-w-3xl mt-6">

        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
            {{ get_the_title() }}
        </h1>

        @include('entry-meta')

    </header>

    <section class="container content my-8">

        {{ the_content() }}

    </section>

    <p class="text-3xl text-center">~</p>

    <footer class="pagination-links container max-w-3xl flex justify-between my-8">
        <span>{{ previous_post_link('← %link') }}</span>
        <span>{{ next_post_link('%link →') }}</span>
    </footer>

    <p class="text-3xl text-center mb-8">~</p>

</article>
