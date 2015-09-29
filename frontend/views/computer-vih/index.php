<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ComputerVihSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Computer Vihs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-vih-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Computer Vih'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'computer_id',
            'asset_code',
            'party.party_name',
            'department.department_name',
            'of_user',
            // 'serial_no',
            // 'computer_localtion',
            // 'computer_name',
            // 'ip',
            // 'mac_address',
            [
                'attribute' => 'created_by',
                'format' => 'text',
                'label' => 'สร้างโดย',
                'value' => 'user.username',
            ],
//            [
//                'attribute' => 'updated_by',
//                'format' => 'text',
//                'label' => 'updated_by',
//                'value' => 'user.username',
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
