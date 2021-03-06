<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\modules\gii;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Gii.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GiiAsset extends \yii\gii\GiiAsset
{
    public $sourcePath = '@backend/modules/gii/assets';
    public $css = [
        'main.css',
    ];
    public $js = [
        'gii.js',
    ];
    public $depends = [
    ];
}
