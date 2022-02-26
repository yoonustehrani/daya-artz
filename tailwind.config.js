const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/views/pages/landing/opening.blade.php",
        "./resources/views/components/layout/landing.blade.php" ,
        "./resources/views/components/layout/menu.blade.php",
        "./resources/views/components/quick-order-form.blade.php",
        "./resources/js/components/QickOrder/QuickOrder.jsx"  
    ],
    theme: {
        fontFamily: {
            sans: ["Iransansweb"]
        },

        extend: {
            colors: {
                'aqua': "#78cad2"
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