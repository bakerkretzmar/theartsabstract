<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function post_thumbnail_caption()
    {
        return get_post(get_post_thumbnail_id())->post_excerpt ?? null;
    }

    public static function title()
    {
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
            return sprintf(__('Search Results for %s', 'theartsabstract'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'theartsabstract');
        }
        return get_the_title();
    }
}
