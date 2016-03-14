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

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass(['admin/admin.scss', 'reqs/multiply.scss'], 'public/css/admin/admin.css');
});

elixir(function(mix) {
    mix.scripts(['app.js'], 'public/js/app.js')
       .scripts([
       		'reqs/multiply.js',
       		'admin/admin.js'], 'public/js/admin.js');
});
