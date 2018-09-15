<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\modules\content\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use backend\modules\content\models\UploadForm;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class VideoController extends Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                // return;
            }
        }
        return $this->render('index', ['model' => new UploadForm()]);
    }

    public function actionUpload()
    {
        return $this->render('index');
    }
}
