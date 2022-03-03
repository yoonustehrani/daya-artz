const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')
const { default: plugin } = require('tailwindcss/plugin')

module.exports = {
    content: [
        "./resources/views/pages/landing/opening.blade.php",
        "./resources/views/components/layout/*.blade.php" ,
        "./resources/views/components/quick-order-form.blade.php",
        "./resources/js/components/QickOrder/QuickOrder.jsx",
        "./resources/js/landing-opening.js"
    ],
    theme: {
        fontFamily: {
            sans: ["Iransansweb"]
        },

        extend: {
            colors: {
                'body': '#fafafa',
                'on-white': "#fefffc",
                'aqua': "#78cad2",
                'social-media': {
                    telegram: "#229ED9",
                    whatsapp: "#25d366",
                    instagram: "#E1306C",
                    linkedin: "#0e76a8",
                    email: "#C71610",
                },
            },
            backgroundImage: {
                'shaped': "url('/images/shaped-background.png')",
                "icon": "url('/images/item-background.png')"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}