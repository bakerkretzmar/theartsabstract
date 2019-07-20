<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Page extends Controller
{
    public static function post_title()
    {
        return get_post()->post_title;
    }

    public static function post_subtitle()
    {
        return get_post_meta(get_post()->ID, 'subtitle', true);
    }

    public static function post_thumbnail(array $attributes = [])
    {
        return the_post_thumbnail('full', $attributes);
    }

    public static function post_thumbnail_caption()
    {
        return get_post(get_post_thumbnail_id())->post_excerpt;
    }

    public static function post_permalink()
    {
        return get_permalink();
    }
}
