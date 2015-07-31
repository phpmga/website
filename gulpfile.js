var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var bowerDir = 'vendor/bower_components/';

elixir(function (mix) {
    // Copy jQuery dependencies
    mix.copy(bowerDir + 'jquery/dist/jquery.min.js', 'resources/assets/js/jquery.min.js');

    // Copy Font Awesome dependencies
    mix.copy(bowerDir + 'font-awesome/fonts', 'public/build/fonts');
    mix.copy(bowerDir + 'font-awesome/css/font-awesome.min.css', 'resources/assets/css/font-awesome.min.css');

    // Copy Angular dependencies
    mix.copy(bowerDir + 'angular/angular.min.js', 'resources/assets/js/angular.min.js');
    mix.copy(bowerDir + 'angular-route/angular-route.min.js', 'resources/assets/js/angular-route.min.js');
    mix.copy(bowerDir + 'angular-scroll/angular-scroll.min.js', 'resources/assets/js/angular-scroll.min.js');

    // Copy Semantic UI dependencies
    mix.copy(bowerDir + 'semantic-ui/dist/semantic.min.js', 'resources/assets/js/semantic.min.js');
    mix.copy(bowerDir + 'semantic-ui/dist/semantic.min.css', 'resources/assets/css/semantic.min.css');
    mix.copy(bowerDir + 'semantic-ui/dist/themes', 'public/build/css/themes');

    // Mix vendor resources
    mix.styles([
        'resources/assets/css/semantic.min.css',
        'resources/assets/css/font-awesome.min.css'
    ], 'public/css/vendor.css');

    mix.scripts([
        'resources/assets/js/jquery.min.js',
        'resources/assets/js/semantic.min.js',
        'resources/assets/js/angular.min.js',
        'resources/assets/js/angular-route.min.js',
        'resources/assets/js/angular-scroll.min.js'
    ], 'public/js/vendor.js');

    // Mix custom resources
    mix.styles([
        'resources/assets/css/main.css'
    ], 'public/css/main.css');

    mix.scripts([
        'resources/assets/js/main.js'
    ], 'public/js/main.js');

    // Build version
    mix.version(['css/vendor.css', 'js/vendor.js', 'css/main.css', 'js/main.js']);
});
