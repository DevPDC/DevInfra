let mix = require('laravel-mix');
let elixir = require('laravel-elixir');

    require('laravel-elixir-vue-2');

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


    mix.js('resources/assets/js/app.js', 'public/js');

    mix.scripts([
        'public/mapping/libs/leaflet-src.js',
        'public/mapping/src/Leaflet.draw.js',
        'public/mapping/src/Leaflet.Draw.Event.js',
        'public/mapping/libs/leaflet.ajax.min.js',
        'public/mapping/plug-ins/leaflet-search.js',
        'public/mapping/src/Toolbar.js',
        'public/mapping/src/Tooltip.js',
        'public/mapping/src/ext/GeometryUtil.js',
        'public/mapping/src/ext/LatLngUtil.js',
        'public/mapping/src/ext/LineUtil.Intersect.js',
        'public/mapping/src/ext/Polygon.Intersect.js',
        'public/mapping/src/ext/Polyline.Intersect.js',
        'public/mapping/src/ext/TouchEvents.js',
        'public/mapping/src/draw/DrawToolbar.js',
        'public/mapping/src/draw/handler/Draw.Feature.js',
        'public/mapping/src/draw/handler/Draw.SimpleShape.js',
        'public/mapping/src/draw/handler/Draw.Polyline.js',
        'public/mapping/src/draw/handler/Draw.Marker.js',
        'public/mapping/src/draw/handler/Draw.Circle.js',
        'public/mapping/src/draw/handler/Draw.CircleMarker.js',
        'public/mapping/src/draw/handler/Draw.Polygon.js',
        'public/mapping/src/draw/handler/Draw.Rectangle.js',
        'public/mapping/src/Control.Draw.js',
        'public/mapping/plug-ins/leaflet-awesome-markers.js',
        'public/mapping/mapping.js'
    ]   , 'public/js/all-mapping.js');

    mix.sass('resources/assets/sass/app.scss', 'public/css/app.css');

    mix.styles([
        'public/css/parsley.css',
        'public/css/progress-tracker.css',
        'public/css/custom.css',
        'public/css/sweetalert2.min.css',
        'public/plugins/HoldOn/HoldOn.min.css'
        ], 'public/css/all.css');

    mix.styles([
        'public/coreui/css/style.css',
        'public/coreui/css/flag-icon.min.css',
        'public/coreui/css/pace.min.css',
        'public/coreui/css/toastr/css/toastr.min.css',
        'public/coreui/css/ladda/css/ladda-themeless.min.css',
        'public/plugins/datetimepicker/jquery.datetimepicker.min.css'
        ], 'public/css/all-coreui.css');

    mix.styles([
        'public/mapping/plug-ins/leaflet-search.css'
        ], 'public/css/all-mapping.css');
