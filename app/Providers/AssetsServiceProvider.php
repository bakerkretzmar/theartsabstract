<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** Register the theme assets. */
        add_action('wp_enqueue_scripts', function (): void {
            remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
        }, 100);

        /** Style the admin interface separately from the editable block content. */
        add_action('admin_enqueue_scripts', function (): void {
            wp_enqueue_style('theartsabstract/admin', Vite::asset('resources/css/admin.css'), ver: null);
        });

        /** Inject scripts into the block editor. */
        add_filter('admin_head', function () {
            if (! get_current_screen()?->is_block_editor()) {
                return;
            }

            $dependencies = json_decode(Vite::content('editor.deps.json'));

            foreach ($dependencies as $dependency) {
                if (wp_script_is($dependency)) {
                    continue;
                }

                wp_enqueue_script($dependency);
            }

            echo Vite::withEntryPoints([
                'resources/js/editor.js',
            ])->toHtml();
        });

        /** Use the generated theme.json file. */
        add_filter('theme_file_path', function ($path, $file) {
            return $file === 'theme.json' ? public_path('build/assets/theme.json') : $path;
        }, 10, 2, );

        /**
         * Remove default theme.json styles and use custom theme.json file path.
         *
         * @link https://developer.wordpress.org/block-editor/reference-guides/filters/global-styles-filters/
         */
        add_filter('wp_theme_json_data_default', function (\WP_Theme_JSON_Data $themeJson): \WP_Theme_JSON_Data {
            $themeJsonFile = public_path('/build/assets/theme.json');
            if (! file_exists($themeJsonFile)) {
                return $themeJson;
            }

            $decodedData = wp_json_file_decode($themeJsonFile, ['associative' => true]);
            if (! is_array($decodedData) || empty($decodedData)) {
                return $themeJson;
            }

            return new \WP_Theme_JSON_Data($decodedData, 'default');
        }, 100, );
    }
}
