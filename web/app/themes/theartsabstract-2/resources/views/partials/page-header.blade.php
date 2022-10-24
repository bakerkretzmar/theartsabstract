<div class="relative w-full h-56 sm:h-64 md:h-80">

    {{ the_post_thumbnail('full', [
        'class' => 'w-full h-full object-cover object-center',
    ]) }}

    <div class="absolute inset-0 flex items-center justify-center">

        <div class="px-6 py-4 bg-white-50 rounded">

            <h1 class="text-5xl font-bold uppercase pt-1">
                {{ App::title() }}
            </h1>

        </div>

    </div>

    @if($post_thumbnail_caption)
        <p class="absolute right-0 bottom-0 px-2 py-1 text-xs text-white bg-black-75">
            {{ $post_thumbnail_caption }}
        </p>
    @endif

</div>
