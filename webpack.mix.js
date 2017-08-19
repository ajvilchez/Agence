let mix = require('laravel-mix');

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

// mix.sass('node_modules/mdbootstrap/sass/mdb.scss','public/css')
// 	.js('node_modules/mdbootstrap/js/mdb.js','public/js')
// 	.js('node_modules/mdbootstrap/js/bootstrap.js','public/js')
// 	.copy('node_modules/jquery/dist/jquery.min.js','public/js')
// 	.copy('node_modules/mdbootstrap/js/popper.min.js','public/js')
// 	.copyDirectory('node_modules/mdbootstrap/font','public/font');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
