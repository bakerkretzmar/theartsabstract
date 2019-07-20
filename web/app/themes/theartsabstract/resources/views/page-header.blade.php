<div class="relative w-full h-56 sm:h-64 md:h-80">

    {{ Page::post_thumbnail([
        'class' => 'w-full h-full object-cover object-center',
    ]) }}

    <div class="absolute inset-0 flex items-center justify-center">

        <div class="px-6 py-4 bg-white-50 rounded">

            <h1 class="text-5xl font-bold uppercase pt-1">
                {{ App::title() }}
            </h1>

        </div>

    </div>

    <p class="absolute right-0 bottom-0 px-2 py-1 text-xs text-white bg-black-75">
        {{ Page::post_thumbnail_caption() }}
    </p>

</div>
