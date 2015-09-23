<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */

$this->title = 'Create Summary On Site';
$this->params['breadcrumbs'][] = ['label' => 'Summary On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-on-site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
