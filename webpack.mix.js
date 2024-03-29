let mix = require('laravel-mix');

mix.js('assets/js/base-editor.js', 'public/js').vue();

mix.js('assets/js/konva-banner.js', 'public/js').vue();

mix.sass('assets/adminkit/scss/light.scss', 'public/css/dashboard.css');

mix.combine([
    'assets/adminkit/js/jquery.min.js',
    'assets/adminkit/js/chart.js',
    'assets/adminkit/js/app.js',
], `public/js/dashboard.js`);