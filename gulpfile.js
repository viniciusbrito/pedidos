var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
    ], 'public/assets/css/app.css');

    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        '../../../node_modules/vue/dist/vue.js',
        '../../../node_modules/vue-resource/dist/vue-resource.js',
        '../../../node_modules/jquery-mask-plugin/dist/jquery.mask.js',
        'lodash.min.js',
        'mask.js',
        'custom.js',
        'revend.js',
    ], 'public/assets/js/app.js');

    mix.copy('node_modules/bootstrap/dist/fonts', 'public/assets/fonts');
    mix.copy('node_modules/font-awesome/fonts', 'public/assets/fonts');
});
