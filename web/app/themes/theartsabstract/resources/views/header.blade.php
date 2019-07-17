<header class="flex items-center justify-between w-full bg-black px-4 py-1">

    <a class="text-2xl text-white hover:text-red-600 font-bold uppercase tracking-wide mt-px" href="{{ home_url('/') }}">
        {{ get_bloginfo('name', 'display') }}
    </a>

    <nav>

        @if(has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'flex oh-3 uppercase',
            ]) !!}
        @endif

        <div class="widget widget_search">
            @include('search-button')
        </div>

    </nav>

</header>
