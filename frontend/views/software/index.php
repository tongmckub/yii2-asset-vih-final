<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SoftwareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพิ่มซอฟต์แวร์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Software', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    Pjax::begin([
        'id' => 'software_id',
        'enablePushState' => false,
        'enableReplaceState' => false,
    ]);
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
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
               // 'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'is_status',
               // 'enableAjax' => true,
                'value' => 'is_status',
               // 'filter' => ArrayHelper::map(common\models\Software::find()->all(), 'software_id', 'software_id')
            ],
            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
