<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    public static function post_title()
    {
        return get_post()->post_title;
    }

    public static function post_subtitle()
    {
        return get_post_meta(get_post()->ID, 'subtitle', true);
    }

    public static function post_thumbnail()
    {
        return the_post_thumbnail('full');
    }
}
