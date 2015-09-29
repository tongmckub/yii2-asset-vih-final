<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use common\models\Party;
use common\models\Department;
/* @var $this yii\web\View */
/* @var $model common\models\ComputerVih */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="computer-vih-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asset_code')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'party_id')->dropDownList(ArrayHelper::map(Party::find()->all(), 'party_id', 'party_name'), [
        'prompt' => '--- เลือกฝ่าย ---',
        'onchange' => '
		$.get( "' . Url::toRoute('computer-vih/party_state') . '", { id: $(this).val() } )
		    .done(function( data ) {
		            $( "#' . Html::getInputId($model, 'department_id') . '" ).html( data );
		        }
		    );'
            ]
    );
    ?>

    <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(common\models\Department::findAll(['party_id' => $model->party_id]),'department_id','department_name'), ['prompt'=>'--- เลือกฝ่าย ---']); ?>


    <?= $form->field($model, 'of_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'serial_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'computer_localtion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'computer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mac_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
