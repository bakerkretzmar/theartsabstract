const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {

    theme: {

        extend: {

            colors: {
                grey: defaultTheme.colors.gray,
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

    variants: {},

    plugins: [

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
