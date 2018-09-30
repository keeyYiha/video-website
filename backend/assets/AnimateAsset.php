<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Description of AnimateAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 2.5
 */
class AnimateAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    // public $sourcePath = '@mdm/admin/assets';

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @inheritdoc
     */
    public $css = [
        'admin/animate.css',
    ];

}
