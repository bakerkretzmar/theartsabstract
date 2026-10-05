<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        /** Style the admin interface separately from the editable block content. */
        add_action('admin_enqueue_scripts', function (): void {
            wp_enqueue_style('theartsabstract/admin', Vite::asset('resources/css/admin.css'), ver: null);
        });

        /** Use the generated theme.json file. */
        add_filter('theme_file_path', function ($path, $file) {
            return $file === 'theme.json' ? public_path('build/assets/theme.json') : $path;
        }, 10, 2);
    }
}
