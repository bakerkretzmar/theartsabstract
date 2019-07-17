<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

use function \Sober\Intervention\intervention;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('theartsabstract/app.css', asset_path('css/app.css'), false, null);
    wp_enqueue_script('theartsabstract/manifest.js', asset_path('js/manifest.js'), null, null, true);
    wp_enqueue_script('theartsabstract/vendor.js', asset_path('js/vendor.js'), null, null, true);
    wp_enqueue_script('theartsabstract/app.js', asset_path('js/app.js'), null, null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-disable-rest-api');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    // add_theme_support('soil-google-analytics', 'UA-XXXXX-Y');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'theartsabstract')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('css/editor.css'));

    /**
     * Clean up dashboard using `soberwp/intervention`
     */
    if (function_exists('\Sober\Intervention\intervention')) {
        intervention('remove-customizer-items');
        // intervention('remove-dashboard-items');
        intervention('remove-emoji');
        intervention('remove-help-tabs');
        intervention('remove-howdy');
        intervention('remove-menu-items', [
            'updates', 'themes', 'theme-widgets', 'theme-menu', 'theme-editor', 'plugins', 'plugin-new', 'plugin-editor', 'user-new', 'tools', 'tool-import', 'tool-export', 'settings', 'setting-writing', 'setting-reading', 'setting-media', 'setting-permalink', 'setting-discussion', 'setting-disable-comments',
        ]);
        intervention('remove-page-components', ['comments']);
        intervention('remove-post-components', ['comments']);
        intervention('remove-toolbar-frontend');
        intervention('remove-toolbar-items', ['comments', 'new']);
        intervention('remove-update-notices');
        intervention('remove-user-fields', [
            'options', 'option-title', 'option-editor', 'option-schemes', 'option-shortcuts', 'option-toolbar', 'name-nickname', 'contact-web', 'about', 'about-bio', 'about-profile',
        ]);
        intervention('remove-user-roles');
        intervention('remove-widgets', [
            'calendar', 'rss', 'recent-comments', 'tag-cloud', 'custom-html', 'custom-menu'
        ]);
        intervention('update-dashboard-columns', 2);
        intervention('update-label-footer', '<span id="footer-thankyou">Thank you for fucking with <a href="https://en-ca.wordpress.org/">WordPress</a>.</span>');
    }
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'theartsabstract'),
        'id'            => 'sidebar-primary'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});
