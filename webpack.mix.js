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
  .js('resources/js/home/login.js', 'public/js/home')
  .js('resources/js/home/index.js', 'public/js/home')
  .js('resources/js/home/detail.js', 'public/js/home')
  .js('resources/js/cart/index.js', 'public/js/cart')
  .js('resources/js/product/index.js', 'public/js/product')
  .js('resources/js/product/create.js', 'public/js/product')
  .js('resources/js/product/update.js', 'public/js/product')
  .sass('resources/sass/app.scss', 'public/css')
  .sass('resources/sass/home/cart.scss', 'public/css/home')
  .sass('resources/sass/home/index.scss', 'public/css/home')
  .sass('resources/sass/home/login.scss', 'public/css/home')
  .sass('resources/sass/product/create.scss', 'public/css/product')
  .sass('resources/sass/product/detail.scss', 'public/css/product')
  .sass('resources/sass/product/edit.scss', 'public/css/product')
  .sass('resources/sass/product/list.scss', 'public/css/product')
  .version()
  .sourceMaps();
