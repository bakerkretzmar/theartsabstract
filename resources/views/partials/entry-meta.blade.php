<p class="mb-2 text-gray-800 [&>a]:link">
    <time datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date('M d, Y') }}
    </time>
    •
    {!! coauthors_posts_links(null, null, null, null, false) !!}
</p>

<p class="text-sm text-gray-600 [&>a]:link">
    In {!! get_the_category_list(', ') !!} • # {!! get_the_tag_list('', ', ') !!}
</p>
