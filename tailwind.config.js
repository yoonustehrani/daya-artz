const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        "./resources/views/pages/landing/opening.blade.php",
        "./resources/views/components/layout/landing.blade.php" ,
        "./resources/views/components/layout/menu.blade.php",
        "./resources/views/components/quick-order-form.blade.php",
        "./resources/js/components/QickOrder/QuickOrder.jsx",
        "./resources/views/components/layout/footer.blade.php" 
    ],
    theme: {
        fontFamily: {
            sans: ["Iransansweb"]
        },

        extend: {
            colors: {
                'aqua': "#78cad2",
                'on-white': "#fefffc",
                'telegram': "#229ED9",
                'whatsapp': "#25d366",
                'instagram': "#E1306C",
                'linkedin': "#0e76a8",
                'email': "#C71610",
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