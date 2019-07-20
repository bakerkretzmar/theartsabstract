const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {

    theme: {

        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
        },

        container: theme => ({
            center: true,
            padding: theme('spacing.4'),
        }),

        extend: {

            colors: {
                'white-25': 'rgba(255, 255, 255, .25)',
                'white-50': 'rgba(255, 255, 255, .50)',
                'white-75': 'rgba(255, 255, 255, .75)',
                'black-25': 'rgba(0, 0, 0, .25)',
                'black-50': 'rgba(0, 0, 0, .50)',
                'black-75': 'rgba(0, 0, 0, .75)',
                grey: defaultTheme.colors.gray,
            },

            spacing: {
                '80': '20rem',
                '96': '24rem',
            },

            fontFamily: {
                sans: [
                    '"Montserrat"',
                    ...defaultTheme.fontFamily.sans,
                ],
                serif: [
                    '"Vollkorn"',
                    ...defaultTheme.fontFamily.serif,
                ],
            },

        },

    },

    variants: {
        opacity: ['responsive', 'group-hover', 'group-focus'],
    },

    plugins: [

        function({ addVariant, e }) {
            addVariant('group-focus', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.group:focus .${e(`group-focus${separator}${className}`)}`
                })
            })
        },

        // Add lobotomized owl and horizontal lobotomized owl
        function ({ addUtilities, config, e }) {
            let newUtilities = {}
            let spacing = config('theme.spacing')

            for (let key in spacing) {
                let className = `.${e(`o-${key}`)} > * + *`
                let marginTop = spacing[key]
                newUtilities[className] = { marginTop }

                let classNameHorizontal = `.${e(`oh-${key}`)} > * + *`
                let marginLeft = spacing[key]
                newUtilities[classNameHorizontal] = { marginLeft }
            }

            addUtilities(newUtilities, ['responsive'])
        },

    ],

}
