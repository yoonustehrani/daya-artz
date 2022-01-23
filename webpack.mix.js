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
        js: "resources/js/",
        sass: "resources/sass/",
        react: "resources/js/react/Pages"
    },
    pub: {
        js: "public/js/",
        css: "public/css/"
    }
}
var { res, pub } = src

mix.disableNotifications()

// mix.js(res.js + 'app.js', pub.js)
    mix.js(res.js + "userarea.js", pub.js).react()
    .sass( res.sass + 'app.scss', pub.css)
    .js(res.js + "fastOrder.js", pub.js ).react()
