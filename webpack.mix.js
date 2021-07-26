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
const path = {
    res: {
        sass: 'resources/sass/',
        js: 'resources/js/'
    },
    pub: {
        js: 'public/js',
        css: 'public/css'
    }
}
const { res, pub } = path
mix.disableNotifications()
// mix.setPublicPath('public/');
// mix.js('resources/js/app.js', 'public/js')

mix.sass(res.sass + "app.scss", pub.css).options({
    processCssUrls: true
})
.js(res.js + 'app.js', pub.js)

