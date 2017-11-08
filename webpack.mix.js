const { mix } = require('laravel-mix');

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

//mix.js('resources/assets/js/app.js', 'public/js');

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
        'public/css/libraries/normalize.css',
        'public/css/libraries/bootstrap/bootstrap.min.css',
        'public/css/libraries/bootstrap/bootstrap-multiselect.min.css',
        'public/css/libraries/fontawesome/css/font-awesome.min.css',
        'public/css/libraries/jquery.fancybox.min.css',
        'public/css/libraries/tooltipster.min.css',
        'public/css/libraries/slick.css',
        'public/css/libraries/datepicker.css',
        'public/css/custom_icons/style.css',
    ], 'public/css/libraries.css');

mix.scripts([
    'resources/assets/js/includes/functions.js',
    'resources/assets/js/includes/scripts.js'
], 'public/js/app.js');

mix.scripts([
    'public/js/libraries/jquery-3.2.1.min.js',
    'public/js/libraries/jquery.fancybox.min.js',
    'public/js/libraries/jquery.marquee.min.js',
    'public/js/libraries/jquery.validate.min.js',
    'public/js/libraries/tether.min.js',
    'public/js/libraries/bootstrap/bootstrap.min.js',
    'public/js/libraries/bootstrap/bootstrap-multiselect.js',
    'public/js/libraries/datepicker.js',
    'public/js/libraries/markerclusterer.js',
    'public/js/libraries/slick.min.js',
    'public/js/libraries/tooltipster.min.js',
], 'public/js/libraries.js');


if (mix.inProduction()) {
    mix.version();
}

