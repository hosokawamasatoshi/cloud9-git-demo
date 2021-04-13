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
   .js('resources/js/lifewake.js', 'public/js') 
   .js('resources/js/d3.min.js', 'public/js') 
   .js('resources/js/c3.min.js', 'public/js') 
   .styles('public/css/c3.css', 'public/css/all.css') 
   .styles('resources/css/lifewake.css', 'public/css/lifewake.css')
   .sass('resources/sass/app.scss', 'public/css');
