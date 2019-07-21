<p class="text-grey-800 mb-2">
    <time datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date('M d, Y') }}
    </time>
    •
    {!! coauthors_posts_links(null, null, null, null, false) !!}
    {{-- @foreach(get_field('authors', get_post()->ID) as $author)
        <a href="https://theartsabstract.test/author/{{ $author['user_nicename'] }}" title="Posts by {{ $author['display_name'] }}" class="link" rel="author">{{ $author['display_name'] }}</a>{{ $loop->count > 1 && ! $loop->last ? ', ' : '' }}
    @endforeach --}}
</p>

<p class="text-grey-600 text-sm categories-tags">
    In {!! get_the_category_list(', ') !!} • # {!! get_the_tag_list('', ', ') !!}
</p>
