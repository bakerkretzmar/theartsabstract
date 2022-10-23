<form role="search" method="get" class="flex items-center justify-center w-full max-w-3xl mx-auto gap-4" action="{{ home_url('/') }}">
    <label class="contents">
        <span class="sr-only">
            {{ _x('Search for:', 'label', 'theartsabstract') }}
        </span>
        <input
            type="search"
            name="s"
            value="{{ get_search_query() }}"
            class="grow px-2 py-1 border-2 border-gray-500 focus:border-blue-500 rounded-lg"
            placeholder="{!! esc_attr_x('Search the Arts Abstract...', 'placeholder', 'theartsabstract') !!}"
        />
    </label>
    <button
        type="submit"
        class="px-6 py-1 text-white font-bold border-2 border-green-500 bg-green-500 hover:border-green-600 hover:bg-green-600 rounded-lg transition-colors"
    >
        {{ _x('Search', 'submit button', 'theartsabstract') }}
    </button>
</form>
