<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SoftwareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพิ่มซอฟต์แวร์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    \yii\widgets\Pjax::begin(
            [
                'id' => 'course-id',
                'enablePushState' => false,
                'enableReplaceState' => false,
            ]
    );
    ?>
    <p>
        <?= Html::a('Create Software', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'software_id',
            'software_name',
            'software_detail:ntext',
            'created_at:dateTime',
            //'updated_at',
            //'updated_by',
            [
                'class' => '\pheme\grid\ToggleColumn',
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'is_status',
                'enableAjax' => false,
                'filter' => ['0' => 'Active', '1' => 'Inactive']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
