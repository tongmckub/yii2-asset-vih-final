<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Division */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if ($this->context->action->id == 'update')
    $action = ['update', 'id' => $_REQUEST['id']];
else
    $action = ['create'];
?>

<div class="division-form">

    <?php
    $form = ActiveForm::begin([
                'id' => 'division-form',
                'action' => $action,
                'enableAjaxValidation' => true,
    ]);
    ?>

    <?= $form->field($model, 'division_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
