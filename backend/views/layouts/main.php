<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\Helper;
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
<body>
<?php $this->beginBody() ?>
<div class="wrap">

  <!-- page-wrapper -->
  <div class="page-wrapper toggled">

    <!-- sidebar-wrapper  -->
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">pro sidebar</a>
        </div>

        <!-- sidebar-header  -->
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="/img/user.jpg" alt="">
            </div>
            <div class="user-info">
                <span class="user-name">Jhon <strong>Smith</strong></span>
                <span class="user-role">Administrator</span>
                <div class="user-status">                       
                    <a href="#"><span class="label label-success">Online</span></a>                           
                </div>
            </div>
        </div>

        <!-- sidebar-menu  -->
        <?php
          $leftMenu = MenuHelper::getLeftMenus(Yii::$app->user->id, Yii::$app->controller->getRoute());
          echo \backend\components\widgets\Menu::widget([
            'items' => $leftMenu
          ]);
        ?>
      </div><!-- sidebar-content  -->

      <div class="sidebar-footer">
          <a href="#">
            <i class="fa fa-bell"></i>
            <span class="label label-warning notification">3</span>
          </a>
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span class="label label-success notification">7</span>
          </a>
          <a href="#"><i class="fa fa-gear"></i></a>
          <a href="#"><i class="fa fa-power-off"></i></a>
      </div>
    </nav>

    <!-- page-content" -->
    <main class="page-content">
      <nav class="navbar navbar-inverse layout-navbar">
        <div class="container-fluid">
          <i id="toggle-sidebar" class="toggle-sidebar glyphicon glyphicon-align-justify"></i>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand layouts-navbar-brand" href="/"><?=Yii::$app->name?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <!-- <form class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Search...">
            </form> -->
            <?php
                $topMenu = MenuHelper::getTopMenus(Yii::$app->user->id, Yii::$app->controller->getRoute());

                if (!Yii::$app->user->isGuest) {
                    $topMenu[] = [
                      'label' => Yii::$app->user->identity->username,
                      'url' => ['/site/logout'],
                    ];
                }

                echo Nav::widget([
                  'items' => $topMenu,
                  'options' => ['class' => 'navbar-nav'],
                ]);
            ?>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
      </div>

      <footer class="footer">
          <div class="container">
              <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

              <p class="pull-right"><?= Yii::powered() ?></p>
          </div>
      </footer>
    </main>

  </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
