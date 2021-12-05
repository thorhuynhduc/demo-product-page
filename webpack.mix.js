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

mix.autoload({
  jquery: ['$', 'jQuery', 'window.jQuery'],
});

mix
  .copyDirectory('resources/images', 'public/images')
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/lib/jquery-validation.js', 'public/js/lib')
  .js('resources/js/product/index.js', 'public/js/product')
  .js('resources/js/product/create.js', 'public/js/product')
  .js('resources/js/product/update.js', 'public/js/product')
  .sass('resources/sass/app.scss', 'public/css')
  .version()
  .sourceMaps();
