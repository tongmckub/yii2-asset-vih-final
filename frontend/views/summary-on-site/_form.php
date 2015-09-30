<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ComputerVih;
use common\models\Software;

/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */
/* @var $form yii\widgets\ActiveForm */
$software_id = Yii::$app->getRequest()->get('s_id');
?>

<div class="col-xs-12 col-lg-12">
    <div class="box-success box view-item col-xs-12 col-lg-12">
        <div class="summary-on-site-form">
            <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-info-circle"></i><?php
                        $softwareData = Software::find()->where('software_id=' . $software_id)->asArray()->one(); echo "&nbsp".$softwareData['software_name'];?></h4>
                </div>
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'software_id')->textInput() ?>

                <?= $form->field($model, 'computer_id')->textInput() ?>
                
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-lg-12">
    <div class="box-info box view-item col-xs-12 col-lg-12">
        <div class="summary-on-site-form">
            <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
                <?php $form = ActiveForm::begin(); ?>

                <?php
                echo maksyutin\duallistbox\Widget::widget([
                    'model' => $model,
                    'attribute' => 'software_id',
                    'title' => 'Listbox',
                    'data' => $computer,
                    'data_id' => 'computer_id',
                    'data_value' => 'computer_id',
                    'lngOptions' => [
                        'warning_info' => 'แจ้งเตือน..',
                        'search_placeholder' => 'ค้นหาเครื่อง',
                        'showing' => 'showing',
                        'available' => 'availble', //title 
                        'selected' => 'selected'
                    ]
                ]);
                ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>