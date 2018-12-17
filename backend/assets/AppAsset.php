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

    public $css = [
        // 'layouts/css/layouts.css',
        // 'layouts/css/font-awesome.min.css',
        // 'layouts/css/jquery.mCustomScrollbar.min.css',
    ];
    public $js = [
        // 'layouts/js/custom.js',
        // 'layouts/js/jquery.mCustomScrollbar.concat.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapPluginAsset',
        // 'yii\bootstrap\BootstrapAsset',
        'backend\assets\Almasaeed2010Asset',
        'backend\assets\IconAsset'
    ];
}
