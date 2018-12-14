<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class Almasaeed2010Asset extends AssetBundle
{
    public $sourcePath = '@almasaeed2010/adminlte';

    public $css = [
        'dist/css/adminlte.min.css',
        'plugins/font-awesome/css/font-awesome.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/iCheck/flat/blue.css',
        'plugins/morris/morris.css',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'plugins/datepicker/datepicker3.css',
        'plugins/daterangepicker/daterangepicker-bs3.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',

    ];
    public $js = [
        'plugins/jquery/jquery.min.js',
        'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.js',
    ];
    public $depends = [
    ];
}
