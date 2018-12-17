<?php

namespace backend\assets;


class IconAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/adyoi/glyphicons-css';

    public $css = [
        'glyphicons-halflings-regular.less',
    ];
    public $js = [];
    public $depends = [];
}