const defaults = require('tailwindcss/defaultTheme');

module.exports = {
    content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Montserrat"', ...defaults.fontFamily.sans],
                serif: ['"Vollkorn"', ...defaults.fontFamily.serif],
            },
            aspectRatio: {
                golden: '34 / 21',
            },
        },
        container: {
            center: true,
            padding: '1rem',
        },
    },
};
