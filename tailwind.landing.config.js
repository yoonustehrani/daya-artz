const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')
const { default: plugin } = require('tailwindcss/plugin')

module.exports = {
    content: [
        './resources/views/pages/landing/new-opening.blade.php',
        './resources/views/pages/landing/coffee-shop.blade.php',
        './resources/js/landing-page.js',
        // './resources/views/components/layout/*.blade.php',
        // './resources/js/landing-opening.js',
        // './resources/views/components/quick-order-form.blade.php',
        './resources/js/components/Landing/**/*.jsx',
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
                },
                'classy-orange': '#d6851b'
            },
            backgroundImage: {
                'coffeeshop-medium': "url('/images/landing/coffee/background-coffee-1280X720.jpg')",
                'coffeeshop': "url('/images/landing/coffee/background-coffee-1536X864.jpg')",
                'coffeeshop-high': "url('/images/landing/coffee/background-coffee-1920X1080.jpg')",
                // "coffeeshop": "url('/images/landing/header-background.jpg')",
                'coffeeshop-pattern': "url('/images/landing/coffee-shop-background-with-pattern.jpg')",
                'footer-pattern': "url('/images/landing/coffee/orange-footer-pattern.png')",
                'coffee-pattern': "url('/images/landing/coffee/coffee-pattern.png')"
            },
            screens: {
                'mobiles': "320px",
                'mobilem': "375px",
                'mobilel': "425px",
                '4k': "2560px"
            }
        },
    },
    safelist: [
        'fa-coffee',
        'fa-utensils-alt'
    ],
    plugins: [
        require('@tailwindcss/forms')({strategy: 'class',}),
    ],
}