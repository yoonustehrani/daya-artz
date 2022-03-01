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
    }
}
var { res, pub } = src

mix.disableNotifications()
// mix.js(res.js + 'app.js', pub.js).react()
mix.js(res.js + "userarea.js", pub.js).react()
    // mix.sass( res.sass + 'app.scss', pub.css)
mix.postCss(res.css + "landing.css", pub.css, [
    require('postcss-import'),
    require('tailwindcss/nesting'),
    require('tailwindcss'),
    require('autoprefixer'),
])
    .js(res.js + "landing-opening.js", pub.js).react()
//     .copy(pub.fonts + "fa-**", res.webfonts)
