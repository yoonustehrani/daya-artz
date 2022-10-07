const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const src = {
    res: {
        css: "resources/css/",
        sass: "resources/sass/",
        js: "resources/js/",
        react: "resources/js/react/Pages",
        webfonts: "resources/webfonts"
    },
    pub: {
        js: "public/js/",
        css: "public/css/",
        fonts: "public/fonts/"
    },
    zeus: {
        res: {
            css: "packages/Zeus/resources/css/",
            js: "packages/Zeus/resources/js/"
        },
        pub: {
            css: "public/css/zeus/",
            js: "public/js/zeus/"
        }
    }
}
var { res, pub, zeus } = src

mix.disableNotifications()

if (mix.inProduction) {
    mix.version()
}

let [sourceMapForProduction, sourceMapType] = [mix.inProduction(), mix.inProduction() ? 'eval' : undefined];

// website
mix.sass(res.sass + 'app.scss', pub.css)
    .sass(res.sass + '_fonts.scss', pub.css)
    .js(res.js + 'app.js', pub.js).react()
    .js(res.js + "userarea.js", pub.js).react().sourceMaps(sourceMapForProduction, sourceMapType)
// err
mix.sass(res.sass + "err.scss", pub.css)
// catalog
mix.postCss(res.css + "catalog.css", pub.css, [
    require("postcss-import"),
    require('tailwindcss/nesting'),
    require('tailwindcss')({config: './tailwind.catalog.config.js'}),
    require('autoprefixer')
])
    .js(src.res.js + "catalog.js", src.pub.js).react()

// landing
mix.postCss(res.css + "landing.css", pub.css, [
        require('postcss-import'),
        require('tailwindcss/nesting'),
        require('tailwindcss')({config: './tailwind.landing.config.js'}),
        require('autoprefixer'), 
    ])
    .js(res.js + "landing-page.js", pub.js).react()
// zeus
mix.postCss(zeus.res.css + "style.css", zeus.pub.css, [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss')({config: "./tailwind.zeus.config.js"}),
    require('autoprefixer')
])
mix.postCss(zeus.res.css + "rtl.css", zeus.pub.css, [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss')({config: './tailwind.zeus.config.js'}),
    require('autoprefixer')
])
mix.js(zeus.res.js + "app.js", zeus.pub.js).react()
mix.js(res.js + "components/zeusTickets.js", pub.js).react()

// tinymce
// mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce')
// mix.js(zeus.res.js + 'tinymce/langs/fa.js', 'public/js/tinymce/langs')

// just need to run once if you got an err
//  mix.copy(pub.fonts + "fa-**", res.webfonts)
    // .copy('node_modules/animate.css/animate.css', res.css)