<?php

namespace App\View\Composers;

use Illuminate\Support\Str;
use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     */
    protected static $views = [
        'partials.page-header',
        'partials.archive-header',
        'partials.content',
        'partials.content-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     */
    public function override(): array
    {
        return [
            'title' => $this->title(),
            'thumbnailCaption' => $this->thumbnailCaption(),
        ];
    }

    /**
     * Returns the post title.
     */
    public function title(): string
    {
        if (! Str::endsWith($this->view->name(), '-header')) {
            return get_the_title();
        }

        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }

            return __('Latest Posts', 'theartsabstract');
        }

        if (is_archive()) {
            return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(
                /* translators: %s is replaced with the search query */
                __('Search Results for %s', 'theartsabstract'),
                get_search_query()
            );
        }

        if (is_404()) {
            return __('Not Found', 'theartsabstract');
        }

        return get_the_title();
    }

    public function thumbnailCaption(): string
    {
        return get_post(get_post_thumbnail_id())->post_excerpt ?? '';
    }
}
