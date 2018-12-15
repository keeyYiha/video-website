<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class Jqueryui extends AssetBundle
{
    public $sourcePath = '@jqueryui';

    public $css = [

    ];
    public $js = [
        'jquery-ui.min.js',
    ],
    public $depends = [
    ];
}
