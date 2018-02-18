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
        'resources/assets/sass/libraries/normalize.css',
        'resources/assets/sass/libraries/bootstrap/bootstrap.min.css',
        'resources/assets/sass/libraries/bootstrap/bootstrap-multiselect.min.css',
        'public/css/libraries/fontawesome/css/font-awesome.min.css',
        'resources/assets/sass/libraries/jquery.fancybox.min.css',
        'resources/assets/sass/libraries/tooltipster.min.css',
        'resources/assets/sass/libraries/slick.css',
        'resources/assets/sass/libraries/datepicker.css',
        'public/css/custom_icons/style.css',
    ], 'public/css/libraries.css');

mix.sass('resources/assets/sass/includes/dashboard.scss', 'public/css/dashboard.css');

mix.scripts([
    'resources/assets/js/includes/details.js'
], 'public/js/details.js');

mix.scripts([
    'resources/assets/js/includes/results.js'
], 'public/js/results.js');

mix.scripts([
    'resources/assets/js/includes/index.js'
], 'public/js/index.js');

mix.scripts([
    'resources/assets/js/includes/functions.js',
    'resources/assets/js/includes/scripts.js'
], 'public/js/app.js');

mix.scripts([
    'resources/assets/js/libraries/messages_fr.js',
], 'public/js/messages_fr.js');

mix.scripts([
    'resources/assets/js/libraries/jquery-3.2.1.min.js',
    'resources/assets/js/libraries/jquery.fancybox.min.js',
    'resources/assets/js/libraries/jquery.marquee.min.js',
    'resources/assets/js/libraries/jquery.validate.min.js',
    'resources/assets/js/libraries/tether.min.js',
    'resources/assets/js/libraries/bootstrap/bootstrap.min.js',
    'resources/assets/js/libraries/bootstrap/bootstrap-multiselect.js',
    'resources/assets/js/libraries/modernizr.js',
    'resources/assets/js/libraries/datepicker.js',
    'resources/assets/js/libraries/markerclusterer.js',
    'resources/assets/js/libraries/slick.min.js',
    'resources/assets/js/libraries/tooltipster.min.js',
    'resources/assets/js/libraries/scrollreveal.min.js',
], 'public/js/libraries.js');

mix.options({
    processCssUrls: false
});


// mix.version();

// if (mix.inProduction()) {
//     mix.version();
// }

