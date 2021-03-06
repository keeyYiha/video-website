<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;
use backend\components\MenuHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

        <?php
            $topMenu = MenuHelper::getTopMenus(Yii::$app->user->id);
        ?>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>

            <?php foreach ($topMenu as $key => $value) { ?>
            <li class="nav-item d-sm-inline-block">
                <a href="<?=$value['url'][0] ?>" class="nav-link"><?=$value['label'] ?></a>
            </li>
            <?php } ?>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fa fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <?php $leftMenu = MenuHelper::getLeftMenus(Yii::$app->user->id); ?>
    <?= $this->render('left.php', ['leftMenu' => $leftMenu]) ?>
    <?= $this->render('right.php') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?=$this->title?></h1>
                    </div>
                    <div class="col-sm-6">
                        <?= backend\components\widgets\Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?= Alert::widget() ?>
        <section class="content"><div class="container-fluid">
            <?= $content ?>
        </div></section>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
