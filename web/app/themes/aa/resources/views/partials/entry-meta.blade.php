<p class="text-gray-800 mb-2">
    <time datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date('M d, Y') }}
    </time>
    •
    {!! coauthors_posts_links(null, null, null, null, false) !!}
</p>

<p class="text-gray-600 text-sm categories-tags">
    In {!! get_the_category_list(', ') !!} • # {!! get_the_tag_list('', ', ') !!}
</p>
