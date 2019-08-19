<header class="flex items-center justify-between w-full bg-black px-4 py-1">

    <a class="text-2xl text-white hover:text-red-600 font-bold uppercase tracking-wider" href="{{ home_url('/') }}">
        {{ get_bloginfo('name') }}
    </a>

    <nav class="hidden md:flex items-center oh-3">

        @if(has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'flex oh-3 uppercase',
            ]) !!}
        @endif

        <a href="{{ home_url('/search') }}" class="text-white hover:text-green-600">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><path stroke="currentColor" stroke-width="2" stroke-miterlimit="10" d="M10.086,5.8684C9.8912,8.1676,7.8694,9.8736,5.5701,9.6788S1.5649,7.4621,1.7597,5.1629 s2.2166-4.0052,4.5159-3.8104S10.2808,3.5691,10.086,5.8684z M8.6138,8.7048l4.0416,4.7899"/></svg>
        </a>

    </nav>

</header>
