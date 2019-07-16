const mix = require('laravel-mix')

mix.disableNotifications()

mix.setPublicPath('dist')
    .js('resources/js/app.js', 'dist/js')
    .extract()
    .postCss('resources/css/app.css', 'dist/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nesting'),
    ])
    .version()
