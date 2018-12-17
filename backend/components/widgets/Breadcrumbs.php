<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\components\widgets;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $tag = 'ol';
    public $options = ['class' => 'breadcrumb float-sm-right'];
    public $itemTemplate = "<li class=\"breadcrumb-item\">{link}</li>\n";
    public $activeItemTemplate = "<li class=\"breadcrumb-item active\">{link}</li>\n";
}
