<header class="flex items-center justify-between w-full bg-black px-4 py-1">
    <a href="{{ home_url() }}" class="text-2xl font-bold text-white hover:text-red-600 uppercase tracking-wider transition-colors">
        {!! $siteName !!}
    </a>

    <nav class="group flex lg:hidden relative" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        <button type="button" class="block text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10zm0 5.25a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" /></svg>
        </button>
        <div class="hidden group-focus-within:flex flex-col absolute right-[-1rem] top-[100%] p-4 mt-2 bg-black z-20">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'flex flex-col items-end gap-3 text-right uppercase [&>*]:text-white hover:[&>*]:text-green-600 [&>*]:transition-colors',
                    'echo' => false,
                ]) !!}
            @endif
            <a href="{{ home_url('search') }}" class="text-white ml-auto mt-3 hover:text-green-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" /></svg>
            </a>
        </div>
    </nav>

    <nav class="hidden lg:flex items-center gap-3" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'flex gap-3 uppercase [&>*]:text-white hover:[&>*]:text-green-600 [&>*]:transition-colors',
                'echo' => false,
            ]) !!}
        @endif
        <a href="{{ home_url('search') }}" class="text-white hover:text-green-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" /></svg>
        </a>
    </nav>
</header>
