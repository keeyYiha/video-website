<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;
use backend\components\Helper;
use backend\components\MenuHelper;

echo json_encode(MenuHelper::getAssignedMenu(Yii::$app->user->id));

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

        <!-- sidebar-search  -->
        <div class="sidebar-search">
            <div>                   
                <div class="input-group">                          
                    <input type="text" class="form-control search-menu" placeholder="Search for...">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                </div>
            </div>                    
        </div>

        <!-- sidebar-menu  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu"><span>Dropdown  menu</span></li>
                <li class="sidebar-dropdown">
                    <a  href="#" ><i class="fa fa-tv"></i><span>Menu 1</span><span class="label label-danger">New</span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="#">submenu 1 <span class="label label-success">10</span></a> </li>
                            <li><a href="#">submenu 2</a></li>
                            <li><a href="#">submenu 3</a></li>
                            <li><a href="#">submenu 4</a></li>
                        </ul>
                    </div>
                </li>                  
                <li class="sidebar-dropdown">
                    <a href="#"><i class="fa fa-photo"></i><span>Menu 2</span><span class="badge">3</span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="#">submenu 1 <span class="badge">2</span></a></li>
                            <li><a href="#">submenu 2</a></li>
                            <li><a href="#">submenu 3</a></li>
                            <li><a href="#">submenu 4</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#"><i class="fa fa-bar-chart-o"></i><span>Menu 3</span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="#">submenu 1</a></li>
                            <li><a href="#">submenu 2</a></li>
                            <li><a href="#">submenu 3</a></li>
                            <li><a href="#">submenu 4</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#"><i class="fa fa-diamond"></i><span>Menu 4</span></a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li><a href="#">submenu 1</a></li>
                            <li><a href="#">submenu 2</a></li>
                            <li><a href="#">submenu 3</a></li>
                            <li><a href="#">submenu 4</a></li>
                        </ul>
                    </div>
                </li>
                <li class="header-menu"><span>Simple menu</span></li>
                <li><a href="#"><i class="fa fa-tv"></i><span>Menu 1</span></a></li>                   
                <li><a href="#"><i class="fa fa-photo"></i><span>Menu 2</span></a></li>
                <li><a href="#"><i class="fa fa-bar-chart-o"></i><span>Menu 3</span></a></li>
                <li><a href="#"><i class="fa fa-diamond"></i><span>Menu 4</span></a></li>
            </ul>
        </div>        
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
            <ul class="nav navbar-nav">
              <?php
                  $value = [
                      ['url' => '/', 'name' => '首页'],
                      ['url' => '/gii', 'name' => 'gii'],
                  ];
                  if (!Yii::$app->user->isGuest) {
                      $value[] = ['url' => '/site/logout', 'name' => Yii::$app->user->identity->username];
                  }

                  $html = "";
                  foreach ($value as $key => $value) {
                      $html .= "<li><a href='{$value['url']}'>{$value['name']}</a></li>";
                  }
                  echo $html;
              ?>
            </ul>
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
