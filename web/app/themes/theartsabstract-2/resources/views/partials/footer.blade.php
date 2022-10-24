<footer class="flex flex-col sm:flex-row items-center justify-between w-full bg-black px-4 py-2">

    <p class="text-white text-sm">
        © {{ date('Y') }} {{ get_bloginfo('name', 'display') }}
    </p>

    <p class="text-white text-sm">
        {{ __('Site by', 'theartsabstract') }} <a class="font-bold text-teal-600" href="https://bakerkretzmar.ca" target="_blank">{{ __('Jacob Baker-Kretzmar', 'theartsabstract') }}</a>
    </p>

</footer>
