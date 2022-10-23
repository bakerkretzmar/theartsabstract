<?php

return [
    'application' => [
        'theme' => 'aa',
        'general' => [
            'site-title' => 'The Arts Abstract',
            'tagline' => 'An arts publication for students at the University of King’s College.',
            'admin-email' => 'jacobtbk@gmail.com',
            'membership' => false,
            'default-role' => 'subscriber',
            'language' => 'en_CA',
            'timezone' => 'America/Halifax',
            'date-format' => 'l F j, Y',
            'time-format' => 'g:i A',
            'week-starts' => 'Monday',
        ],
        'writing' => [
            'emoji' => false,
            'default-category' => 1,
            'default-post-format' => 'standard',
            'post-via-email.server' => '',
            'post-via-email.login' => '',
            'post-via-email.pass' => '',
            'post-via-email.port' => 0,
            'post-via-email.default-category' => 1,
            'update-services' => '',
        ],
        'reading' => [
            'front-page' => 'posts',
            'posts-per-page' => 1000,
            'posts-per-rss' => 10,
            'rss-excerpt' => 'full',
        ],
        'media' => [
            'sizes.thumbnail.width' => 150,
            'sizes.thumbnail.height' => 150,
            'sizes.thumbnail.crop' => true,
            'sizes.medium.width' => 300,
            'sizes.medium.height' => 300,
            'sizes.large.width' => 1024,
            'sizes.large.height' => 1024,
            'uploads.organize' => true,
        ],
        'permalinks' => [
            'structure' => '/%year%/%monthnum%/%postname%/',
            'category-base' => '',
            'tag-base' => '',
        ],
    ],
    'wp-admin.all' => [
        'appearance' => [
            'customize',
            // 'widgets' => [
            //     'available' => [
            //         'calendar',
            //         'rss',
            //         'recent-comments',
            //         'tag-cloud',
            //         'custom-html',
            //         'custom-menu',
            //     ],
            // ],
        ],
        'common' => [
            'adminbar' => [
                'comments',
                'new',
                'theme',
                'user' => [
                    'howdy',
                ],
                'wp',
            ],
            'menu' => [
                'collapse',
            ],
            'tabs',
            'updates',
        ],
        'dashboard' => [
            'home' => [
                'cols' => 2,
            ],
            'updates' => 'dashboard',
        ],
        'plugins' => [
            'add' => 'dashboard',
        ],
        'pages' => [
            'item' => [
                'comments',
            ],
        ],
        'posts' => [
            'item' => [
                'comments',
            ],
        ],
        'users' => [
            'add' => 'dashboard',
            'profile' => [
                'about',
                'about-bio',
                'about-profile',
                'contact-web',
                'name-nickname',
                'option-editor',
                'option-schemes',
                'option-shortcuts',
                'option-title',
                'option-toolbar',
                'options',
                'role' => [
                    'author',
                    'subscriber',
                ],
            ],
        ],
        'tools' => 'dashboard',
        'settings' => 'dashboard',
    ],
];
