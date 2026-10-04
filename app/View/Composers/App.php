<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     */
    protected static $views = ['*'];

    /**
     * Returns the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }
}
