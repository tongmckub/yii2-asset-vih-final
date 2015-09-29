<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Party */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Party',
]) . ' ' . $model->party_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Parties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->party_id, 'url' => ['view', 'id' => $model->party_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="party-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
