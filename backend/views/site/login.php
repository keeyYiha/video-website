<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<div class="site-login">
    <div class="demo form-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                        <h1 class="heading" style="text-align: center;"><?= Html::encode($this->title) ?></h1>
                        <p>Please fill out the following fields to login:</p>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <div class="main-checkbox" style="float: left;">
                            <label for="loginform-rememberme">
                                <input type="hidden" name="LoginForm[rememberMe]" value="0"><input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="">
                            Remember Me
                            </label>
                                <p class="help-block help-block-error"></p>

                            </div>
                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => "float: right;"]) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
