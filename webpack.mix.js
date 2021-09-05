const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

const src = {
    res: {
        js: "resources/js/",
        sass: "resources/sass/",
        react: "resources/js/react/"
    },
    pub: {
        js: "public/js/",
        css: "public/css/"
    }
}
var { res, pub } = src

mix.disableNotifications()

mix.js( res.js + 'app.js', pub.js)
    .sass( res.sass + 'app.scss', pub.css)
    .js(res.react + "login.js", pub.js).react();
