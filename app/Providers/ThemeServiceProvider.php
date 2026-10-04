<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        // Blade::withoutDoubleEncoding();

        /** Register theme support and navigation menus from the theme config. */
        add_action('after_setup_theme', function (): void {
            Collection::make(config('theme.support'))->map(fn ($params, $feature) => (
                is_array($params) ? [$feature, $params] : [$params]
            ))->each(fn ($params) => add_theme_support(...$params));

            Collection::make(config('theme.remove'))->map(fn ($entry) => (
                is_string($entry) ? [$entry] : $entry
            ))->each(fn ($params) => remove_theme_support(...$params));

            register_nav_menus(config('theme.menus'));

            Collection::make(config('theme.image_sizes'))->each(
                fn ($params, $name) => add_image_size($name, ...$params),
            );
        }, 20, );

        /**
         * Disable on-demand block asset loading.
         *
         * @link https://core.trac.wordpress.org/ticket/61965
         */
        add_filter('should_load_separate_core_block_assets', '__return_false');

        /** Register sidebars from the theme config. */
        add_action('widgets_init', function (): void {
            Collection::make(config('theme.sidebar.register'))->map(fn ($instance) => register_sidebar(array_merge(
                config('theme.sidebar.config'),
                $instance,
            )));
        });

        /** Add a continuation link to automatically generated excerpts. */
        add_filter('excerpt_more', fn (): string => sprintf(
            ' &hellip; <a href="%s">%s</a>',
            esc_url(get_permalink()),
            esc_html__('Continued', 'theartsabstract'),
        ));

        /** Add featured image columns to the post and page lists. */
        $addThumbnailColumn = fn (array $columns): array => array_merge(
            array_slice($columns, 0, 1, true),
            ['thumbnail' => __('Thumbnail', 'theartsabstract')],
            array_slice($columns, 1, null, true),
        );

        $renderThumbnailColumn = function (string $column, int $postId): void {
            if ($column === 'thumbnail') {
                echo get_the_post_thumbnail($postId, 'thumbnail');
            }
        };

        foreach (['posts', 'pages'] as $type) {
            add_filter("manage_{$type}_columns", $addThumbnailColumn);
            add_action("manage_{$type}_custom_column", $renderThumbnailColumn, 10, 2);
        }
    }
}
