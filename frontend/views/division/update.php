<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Division */

$this->title = 'Update Division: ' . ' ' . $model->division_id;
$this->params['breadcrumbs'][] = ['label' => 'Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->division_id, 'url' => ['view', 'id' => $model->division_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="division-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
