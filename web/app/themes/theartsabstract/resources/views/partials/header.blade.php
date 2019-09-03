<header class="flex items-center justify-between w-full bg-black px-4 py-1">

    <a class="text-2xl text-white hover:text-red-600 font-bold uppercase tracking-wider" href="{{ home_url('/') }}">
        {{ get_bloginfo('name') }}
    </a>

    <nav class="flex lg:hidden relative">

        <input type="checkbox" class="hidden" id="mobile-menu-toggle">

        <label for="mobile-menu-toggle" class="text-white">
            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
        </label>

        <div id="mobile-menu" class="hidden flex-col absolute right-0 top-0 p-4 mt-8 -mr-4 bg-black z-20">

            @if(has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'flex flex-col text-right o-3 uppercase',
                ]) !!}
            @endif

            <a href="{{ home_url('/search') }}" class="text-white ml-auto mt-3 hover:text-green-600">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><path stroke="currentColor" stroke-width="2" stroke-miterlimit="10" d="M10.086,5.8684C9.8912,8.1676,7.8694,9.8736,5.5701,9.6788S1.5649,7.4621,1.7597,5.1629 s2.2166-4.0052,4.5159-3.8104S10.2808,3.5691,10.086,5.8684z M8.6138,8.7048l4.0416,4.7899"/></svg>
            </a>

        </div>

    </nav>

    <nav class="hidden lg:flex items-center oh-3">

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
