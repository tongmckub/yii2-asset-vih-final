<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ComputerVih */

$this->title = $model->computer_id;
$this->params['breadcrumbs'][] = ['label' => 'Computer Vihs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-vih-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->computer_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->computer_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'computer_id',
            'asset_code',
            'division_id',
            'of_user',
            'serial_no',
            'computer_localtion',
            'computer_name',
            'ip',
            'mac_address',
            'created_by',
        ],
    ]) ?>

</div>
