<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $sourcePath = '@backend/static/';

    public $css = [
        'layouts/css/layouts.css',
        'layouts/css/font-awesome.min.css',
        'layouts/css/htmleaf-demo.css',
        'layouts/css/jquery.mCustomScrollbar.min.css',
        'layouts/css/normalize.css',
    ];
    public $js = [
        'layouts/js/custom.js',
        'layouts/js/jquery.mCustomScrollbar.concat.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
