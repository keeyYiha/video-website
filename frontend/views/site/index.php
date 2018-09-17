<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <?php
                $models = $query->all();
                foreach ($models as $model) {
                    $img = 'http://'.Yii::$app->params['assets']['host'].DIRECTORY_SEPARATOR.$model->avatar;

                    $gender = "男";
                    if ($model->gender == 1) {
                        $gender = "男";
                    } elseif ($model->gender == 2) {
                        $gender = "女";
                    }
            ?>

            <div class="col-lg-3">
                <h2><?=$model->name?></h2>

                <img src="<?=$img?>"  alt='avatar' width='100%' />
                <p>性别：<?=$gender?></p>
            </div>

            <?php
                }
            ?>
        </div>

    </div>
</div>
