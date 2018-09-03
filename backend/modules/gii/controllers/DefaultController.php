<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\modules\gii\controllers;

use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DefaultController extends \yii\gii\controllers\DefaultController
{
    public function actionIndex()
    {
        $this->layout = 'generator';
        return $this->render('index');
    }
}
