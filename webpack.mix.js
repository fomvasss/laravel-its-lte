let mix = require('laravel-mix');

let paths = {
    'bowerPath': './bower_components/',
    'webDev': {
        'css': './resources/css/',
        'js': './resources/js/',
    },
    'webProd': {
        'public': './public/',
        'css': './public/css/',
        'js': './public/js/',
        'fonts': './public/fonts/',
        'img': './public/img/'
    }
};

mix.setPublicPath('public').disableNotifications();

mix.combine([
    paths.bowerPath + 'bootstrap/dist/css/bootstrap.min.css',
    paths.bowerPath + 'font-awesome/css/font-awesome.min.css',
    paths.bowerPath + 'Ionicons/css/ionicons.min.css',
    paths.bowerPath + 'select2/dist/css/select2.min.css',
    paths.bowerPath + 'morris.js/morris.css',
    paths.bowerPath + 'jvectormap/jquery-jvectormap.css',
    paths.bowerPath + 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
    paths.bowerPath + 'bootstrap-daterangepicker/daterangepicker.css',
    paths.bowerPath + 'bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css',
    paths.bowerPath + 'PACE/themes/white/pace-theme-flash.css',
    paths.bowerPath + 'bootstrap-treeview/dist/bootstrap-treeview.min.css',
    paths.bowerPath + 'select2-to-tree/src/select2totree.css',
    paths.bowerPath + 'toastr/toastr.min.css',
    paths.bowerPath + 'x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css',
    paths.bowerPath + 'datetimepicker/jquery.datetimepicker.css',
    paths.bowerPath + 'chart.js/dist/Chart.min.css',
    paths.bowerPath + 'bootstrap-sweetalert/dist/sweetalert.css',
    paths.webDev.css + 'skins/_all-skins.min.css',
    paths.webDev.css + 'AdminLTE.min.css',
    //paths.webDev.css + 'dashboard.css',
], paths.webProd.css + 'main.css', false);

mix.combine([
    paths.bowerPath + 'jquery/dist/jquery.js',
    paths.bowerPath + 'jquery-ui/jquery-ui.min.js',
    paths.bowerPath + 'bootstrap/dist/js/bootstrap.min.js',
    paths.bowerPath + 'raphael/raphael.min.js',
    paths.bowerPath + 'morris.js/morris.min.js',
    paths.bowerPath + 'jquery-sparkline/dist/jquery.sparkline.min.js',
    paths.bowerPath + 'jquery-knob/dist/jquery.knob.min.js',
    paths.bowerPath + 'moment/min/moment.min.js',
    paths.bowerPath + 'bootstrap-daterangepicker/daterangepicker.js',
    paths.bowerPath + 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    paths.bowerPath + 'bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js',
    paths.bowerPath + 'jquery-slimscroll/jquery.slimscroll.min.js',
    paths.bowerPath + 'fastclick/lib/fastclick.js',
    paths.bowerPath + 'select2/dist/js/select2.full.min.js',
    paths.bowerPath + 'select2/dist/js/i18n/ru.js',
    paths.bowerPath + 'jquery-sortable/source/js/jquery-sortable-min.js',
    paths.bowerPath + 'PACE/pace.min.js',
    paths.bowerPath + 'bootstrap-treeview/dist/bootstrap-treeview.min.js',
    paths.bowerPath + 'select2-to-tree/src/select2totree.js',
    paths.bowerPath + 'toastr/toastr.min.js',
    paths.bowerPath + 'x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js',
    paths.bowerPath + 'datetimepicker/build/jquery.datetimepicker.full.js',
    paths.bowerPath + 'chart.js/dist/Chart.min.js',
    paths.bowerPath + 'bootstrap-sweetalert/dist/sweetalert.min.js',
    paths.webDev.js + 'adminlte.min.js',
], paths.webProd.js + 'main.js', false);

mix.copy(paths.webDev.css + 'dashboard.css', paths.webProd.css + 'dashboard.css');
mix.copy(paths.webDev.js + 'dashboard.js', paths.webProd.js + 'dashboard.js');
mix.copyDirectory(paths.bowerPath + 'font-awesome/fonts', paths.webProd.fonts);
mix.copyDirectory(paths.bowerPath + 'Ionicons/fonts', paths.webProd.fonts);
mix.copyDirectory(paths.bowerPath + 'bootstrap/fonts', paths.webProd.fonts);
mix.copyDirectory(paths.bowerPath + 'ckeditor', paths.webProd.public + 'ckeditor');
mix.copyDirectory(paths.bowerPath + 'x-editable/dist/bootstrap3-editable/img', paths.webProd.img);

if (mix.inProduction()) {
    /* Minify assets */
    mix.minify(paths.webProd.css + 'main.css').version();
    mix.minify(paths.webProd.js + 'main.js').version();
    // mix.minify(paths.webProd.css + 'dashboard.css').version();
    // mix.minify(paths.webProd.js + 'dashboard.js').version();
}

