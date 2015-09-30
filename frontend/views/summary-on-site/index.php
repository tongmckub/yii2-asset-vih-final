<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SummaryOnSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการคอมพิวเตอร์';
$this->params['breadcrumbs'][] = $this->title;
echo $isRole = Yii::$app->session->get('role_name');
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
                        <span class="edusec-link-box-icon bg-green"><i class="fa fa-sitemap"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จัดการซอฟต์แวร์', ['/software/index']); ?></span>
                            <span class="edusec-link-box-number"><?= \common\models\Software::find()->where(['is_status' => 0])->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/course/section/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จัดการเครื่องคอมพิวเตอร์', ['/computer-vih/index']); ?></span>
                            <span class="edusec-link-box-number"><?= common\models\ComputerVih::find()->where(['is_status' => 0, 'computer_localtion' => $isRole])->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/computer-vih/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            </div> <!-- /. End Row-->	
        </div><!-- /.box-body -->
    </div>    

    <div class="box box-default">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="ion ion-university"></i>
                <h3 class="box-title">จำนวนซอฟต์แวร์</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list" id="coursList">
                    <?php
                    $SoftwareList = \common\models\Software::find()->all();
                    foreach ($SoftwareList as $sl):
                        ?>
                        <li>
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <span class="text">
                                <?php echo $sl->software_name; ?>
                            </span>
                            <?php $comCount = \common\models\SummaryOnSite::find()->where(['software_id' => $sl->software_id])->count(); ?>
                            <div class="pull-right box-tools">
                                <span class="btn btn-sm btn-warning disp-count">
                                    <i class="fa fa-sitemap"></i> Computer &nbsp;
                                    <span class="badge">
                                        <?= $comCount; ?>
                                    </span>
                                </span>
                                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['summary-on-site/create', 's_id' => $sl->software_id], ['class' => 'btn btn-sm btn-info disp-count', 'title' => 'Add Computer to Group']) ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
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
            //'updated_by',
            // 'created_at',
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
