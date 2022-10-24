const mix = require('laravel-mix')

mix.disableNotifications()

mix.setPublicPath('dist')
    .js('resources/js/app.js', 'dist/js').extract()
    .postCss('resources/css/app.css', 'dist/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('postcss-nesting'),
    ])
    .copy('resources/css/admin.css', 'dist/css')
    .copy('resources/css/editor.css', 'dist/css')
    .copyDirectory('resources/img', 'dist/img')
    .version()
