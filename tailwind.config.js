const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/views/pages/landing/opening.blade.php",
        "./resources/views/components/layout/landing.blade.php" ,
        "./resources/views/components/layout/menu.blade.php"       
    ],
    theme: {
        fontFamily: {
            sans: ["Iransansweb"]
        },

        extend: {
            colors: {

            }
        },
    },
    plugins: [
        require('@tailwindcss/forms')({strategy: 'class',}),
    ],
}