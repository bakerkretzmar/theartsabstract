<div class="posts-grid">

    @while(have_posts())

        {{ the_post() }}

        <div class="aspect-ratio-golden">

            <a href="{{ get_permalink() }}" class="group aspect-ratio block overflow-hidden">

                {{ the_post_thumbnail('full', [
                    'class' => 'w-full h-full object-cover object-center',
                ]) }}

                <div class="absolute inset-0 flex flex-col items-center justify-center o-2 opacity-0 group-hover:opacity-100 group-focus:opacity-100 bg-white-75 transition-200">

                    <h2 class="w-5/6 text-3xl font-bold text-center leading-tighter uppercase">
                        {{ get_the_title() }}
                    </h2>

                    <h4 class="w-5/6 text-xl font-bold text-center text-grey-800 leading-tight">
                        {{ get_post_meta(get_post()->ID, 'subtitle', true) }}
                    </h4>

                </div>

            </a>

        </div>

    @endwhile

</div>
