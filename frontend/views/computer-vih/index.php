<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Division;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ComputerVihSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Computer Vihs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-vih-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Computer Vih', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'computer_id',
            'asset_code',
            //'division_id'
            [
                'label' => 'ฝ่าย',
                'attribute' => 'division_id',
                'value' => 'division.division_name',
               // 'filter' => ''
                'filter' => ArrayHelper::map(\common\models\Division::find()->all(),'division_id','division_name')
            ],
            'of_user',
            'serial_no',
            // 'computer_localtion',
            // 'computer_name',
            // 'ip',
            // 'mac_address',
            // 'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
