<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComputerVihSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="computer-vih-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'computer_id') ?>

    <?= $form->field($model, 'asset_code') ?>

    <?= $form->field($model, 'division_id') ?>

    <?= $form->field($model, 'of_user') ?>

    <?= $form->field($model, 'serial_no') ?>

    <?php // echo $form->field($model, 'computer_localtion') ?>

    <?php // echo $form->field($model, 'computer_name') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'mac_address') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
