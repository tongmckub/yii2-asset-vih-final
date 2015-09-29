<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ComputerVih */

$this->title = Yii::t('app', 'Create Computer Vih');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Computer Vihs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-vih-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
