<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ComputervihSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="computervih-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'computer_id') ?>

    <?= $form->field($model, 'asset_code') ?>

    <?= $form->field($model, 'party_id') ?>

    <?= $form->field($model, 'department_id') ?>

    <?= $form->field($model, 'of_user') ?>

    <?php // echo $form->field($model, 'serial_no') ?>

    <?php // echo $form->field($model, 'computer_localtion') ?>

    <?php // echo $form->field($model, 'computer_name') ?>

    <?php // echo $form->field($model, 'ip') ?>

    <?php // echo $form->field($model, 'mac_address') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
