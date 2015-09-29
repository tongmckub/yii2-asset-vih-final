<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ComputerVih */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Computer Vih',
]) . ' ' . $model->computer_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Computer Vihs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->computer_id, 'url' => ['view', 'id' => $model->computer_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="computer-vih-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
