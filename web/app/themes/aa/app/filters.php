<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 */

add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Add featured image thumbnail columns in admin.
 */

if (! function_exists('add_thumbnail_column')) {
    function add_thumbnail_column($columns) {
        return array_merge(
            array_slice($columns, 0, 1, true),
            ['thumbnail' => 'Thumbnail'],
            array_slice($columns, 1, count($columns) - 1, true)
        );
    }
}

if (! function_exists('thumbnail_column')) {
    function thumbnail_column($column, $id) {
        if ($column === 'thumbnail') {
            echo the_post_thumbnail('thumbnail');
        }
    }
}

add_filter('manage_posts_columns', 'App\\add_thumbnail_column');
add_action('manage_posts_custom_column', 'App\\thumbnail_column', 10, 2);

add_filter('manage_pages_columns', 'App\\add_thumbnail_column');
add_action('manage_pages_custom_column', 'App\\thumbnail_column', 10, 2);
