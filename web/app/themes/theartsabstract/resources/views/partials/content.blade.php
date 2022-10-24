<article {!! post_class() !!}>
    <div class="relative w-full h-[calc(100vh-40px)]">
        {{ the_post_thumbnail('full', ['class' => 'w-full h-full object-cover object-center']) }}
        @if ($thumbnailCaption)
            <p class="absolute right-0 bottom-0 px-2 py-1 text-xs text-white bg-black/75">
                {{ $thumbnailCaption }}
            </p>
        @endif
    </div>
    <header class="container max-w-3xl mt-6">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
            {!! $title !!}
        </h1>
        @include('partials.entry-meta')
    </header>
    <section class="editor-content container max-w-3xl my-8 space-y-6 font-serif text-xl leading-relaxed">
        {{ the_content() }}
    </section>
    <p class="text-3xl text-center">~</p>
    <footer class="pagination-links container max-w-3xl flex flex-col sm:flex-row justify-between my-8 space-y-6 sm:space-y-0">
        <p class="flex items-center sm:w-1/2 pr-2 space-x-4">
            <span>←</span>
            <span class="[&>a]:link">{{ previous_post_link('%link') }}</span>
        </p>
        <p class="flex items-center self-end justify-end sm:w-1/2 pl-2 space-x-4 text-right">
            <span class="[&>a]:link">{{ next_post_link('%link') }}</span>
            <span>→</span>
        </p>
    </footer>
    <p class="text-3xl text-center mb-8">~</p>
</article>
