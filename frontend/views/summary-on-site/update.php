<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */

$this->title = 'Update Summary On Site: ' . ' ' . $model->summary_id;
$this->params['breadcrumbs'][] = ['label' => 'Summary On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->summary_id, 'url' => ['view', 'id' => $model->summary_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="summary-on-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
