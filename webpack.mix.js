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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]).react();
mix.styles(['resources/front/css/app.css',
    'resources/front/css/bootstrap.css',
    'resources/front/css/app.css'],
    'public/css/styles.css');
mix.scripts(['resources/front/js/jquery-3.5.1.min.js',
        'resources/js/app.js',
        'resources/front/js/bootstrap.js'
    // ], 'public/js/script.js').extract(['react']);
    ], 'public/js/script.js');
mix.copyDirectory('resources/front/images', 'public/images');
