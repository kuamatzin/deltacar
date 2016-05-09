var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.scripts([
        '../../bower/jquery/dist/jquery.js',
        '../../bower/bootstrap-sass/assets/javascripts/bootstrap.js'
    ], 'public/js/vendor.js');

    mix.copy('resources/bower/bootstrap-sass/assets/fonts/bootstrap', 'public/fonts');
});
