<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-box" id="login-box">

    <div class="header"><?= Html::encode($this->title) ?></div>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="body bg-gray">
        <p>Please fill out the following fields to login:</p>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    </div>
    <div class="footer">

        <?= Html::submitButton('Login', ['class' => 'btn bg-olive btn-block', 'name' => 'login-button']) ?>

        <p><a href="#">I forgot my password</a></p>
        
    </div>
    <?php ActiveForm::end(); ?>
      <?php if(\Yii::$app->session->hasFlash('loginError')) : ?>
	    <div class="alert alert-danger alert-dismissible" style="margin-top: 5%;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
		<?php echo \Yii::$app->session->getFlash('loginError'); ?>
	    </div>
       <?php endif; ?>
</div>

