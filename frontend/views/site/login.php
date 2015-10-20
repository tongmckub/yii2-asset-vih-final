<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'VIH Asset Manager';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-box" id="login-box">
    <div class="header bg-blue"><?= Html::encode($this->title) ?></div>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="body bg-gray" style="margin-top: -20px;">
        <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username', 'class' => 'form-control'])->label(false) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label(false) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>
    <div class="footer">
        <?= Html::submitButton('Login', ['class' => 'btn bg-blue btn-block', 'name' => 'login-button']) ?>      
    </div>
    <?php ActiveForm::end(); ?>
    <?php if (\Yii::$app->session->hasFlash('loginError')) : ?>
        <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?php echo \Yii::$app->session->getFlash('loginError'); ?>
        </div>
    <?php endif; ?>
</div>

