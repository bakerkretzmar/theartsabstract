import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import defaultTheme from 'tailwindcss/defaultTheme';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        tailwindcss(),
        laravel({
            input: ['resources/css/app.css', 'resources/css/admin.css', 'resources/js/editor.js'],
            refresh: true,
            assets: ['resources/images/**'],
            fonts: [
                bunny('Montserrat', {
                    alias: 'sans',
                    variable: '--font-montserrat',
                    weights: [400, 700],
                    fallbacks: defaultTheme.fontFamily.sans,
                }),
                bunny('Vollkorn', {
                    alias: 'serif',
                    variable: '--font-vollkorn',
                    weights: [400, 700],
                    styles: ['normal', 'italic'],
                    preload: [{ weight: 400 }],
                    fallbacks: defaultTheme.fontFamily.serif,
                }),
            ],
        }),
        wordpressPlugin(),
        wordpressThemeJson({
            disableTailwindColors: false,
            disableTailwindFonts: false,
            disableTailwindFontSizes: false,
            disableTailwindBorderRadius: false,
        }),
    ],
});
