const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')
const { default: plugin } = require('tailwindcss/plugin')

module.exports = {
    content: [
        // './resources/views/pages/landing/new-opening.blade.php',
        './resources/views/pages/landing/coffee-shop.blade.php',
        // './resources/views/components/layout/*.blade.php',
        // './resources/js/landing-opening.js',
        // './resources/views/components/quick-order-form.blade.php',
        // './resources/js/components/Landing/**/*.jsx',
        // './resources/js/landing-opening.js',
    ],
    theme: {
        fontFamily: {
            iransans: ["Iransansweb"],
            sans: ['Open Sans', ...defaultTheme.fontFamily.sans]
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
                green: colors.emerald,
				yellow: colors.amber,
				purple: colors.violet,
				'ghost-white': {
					DEFAULT : '#f7f7ffff',
					lighter: '#F7F7FF'
				},
				mango: {
					DEFAULT:'#ffbe0bff',
					light: '#FFEEC1',
					lighter: '#FFF6E0'
				},
				'black-coral': '#495867ff',
				'spring-green': {
					DEFAULT: '#10da6b',
					dark: '#09b858'
				},
				salsa: '#f03a47ff',
				'red-ryb': '#ff101fff',
				'blue-yonder': {
					DEFAULT: '#577399ff',
					dark: '#212B39'
				},
                'daya-purple': {
                    light: '#AC7FF4',
                    dark: '#6232DE',
                    medium: '#8F60EC'
                }
            },
            backgroundImage: {
                "coffeeshop": "url('/images/landing/header-background.jpg')"
            },
            screens: {
                'mobiles': "320px",
                'mobilem': "375px",
                'mobilel': "425px",
                '4k': "2560px"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms')({strategy: 'class',}),
    ],
}