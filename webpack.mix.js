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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

//
// mix.js('node_modules/@yaireo/tagify/dist/tagify.min.js', 'public/js')
//     .styles('node_modules/@yaireo/tagify/dist/tagify.css', 'public/css/tagify.css')

mix.scripts([
    'node_modules/@yaireo/tagify/src/tagify.js',
],  'public/js/tagify.js')
    .styles(['node_modules/@yaireo/tagify/dist/tagify.css'], 'public/css/tagify.css')

