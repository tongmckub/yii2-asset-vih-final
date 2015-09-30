<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SummaryOnSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการคอมพิวเตอร์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-on-site-index">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-graduation-cap"></i> จัดการคอมพิวเตอร์ by Site </h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จัดการเครื่องคอมพิวเตอร์', ['/computer-vih/index']); ?></span>
                            <span class="edusec-link-box-number"><?= common\models\ComputerVih::find()->where(['is_status' => 0])->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/computer-vih/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            </div> <!-- /. End Row-->	
        </div><!-- /.box-body -->
    </div>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Summary On Site', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'summary_id',
            'software_id',
            'computer_id',
            'created_by',
            'updated_by',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
