<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SummaryOnSiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'จัดการคอมพิวเตอร์';
$this->params['breadcrumbs'][] = $this->title;
echo $isRole = Yii::$app->session->get('role_name');
?>

<?php
if (Yii::$app->session->hasFlash('green-0') || Yii::$app->session->hasFlash('red-0')) :
    ?>
    <div class="col-xs-12">
        <div class="alert alert-dismissible" style="background-color: #FFFFFF;border-color: #00c0ef;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?php
            foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                echo '<p class="text-' . preg_split('/[\s,-]+/', $key)[0] . '" style="padding-bottom:10px">' . $message . '</p>';
            }
            ?>
        </div>
    </div>
    <?php
endif;
?>
<div class="summary-on-site-index">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="glyphicon glyphicon-list-alt"></i> จัดการคอมพิวเตอร์ by Site </h3>
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
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/software/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-yellow"><i class="fa fa-graduation-cap"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จัดการเครื่องคอมพิวเตอร์', ['/computer-vih/index']); ?></span>
                            <span class="edusec-link-box-number"><?= \common\models\ComputerVih::find()->where(['is_status' => 0])->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/computer-vih/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-teal"><i class="fa fa-cog"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จำนวนคอมพิวเตอร์ที่ใช้ชอฟต์แวร์', ['/summary-on-site/index']); ?></span>
                            <span class="edusec-link-box-number"><?= common\models\SummaryOnSite::find()->andWhere(['is_status' => 0])->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/summary-on-site/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            </div> <!-- /. End Row-->	
        </div><!-- /.box-body -->
    </div>    

    <div class="box box-default">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="glyphicon glyphicon-list-alt"></i>
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
                            <!--ปุ่ม count com-->
                            <?php $comCount = \common\models\SummaryOnSite::find()->where(['software_id' => $sl->software_id , 'is_status' => 0])->count(); ?>
                            <div class="pull-right box-tools">
                                <span class="btn btn-sm btn-warning disp-count">
                                    <i class="fa fa-sitemap"></i> Computer &nbsp;
                                    <span class="badge">
                                        <?= Html::a($comCount, ['software/view', 'id' => $sl->software_id]) ?> 
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
    <?php
    Pjax::begin([
        'id' => 'summary_id',
        'enablePushState' => false,
        'enableReplaceState' => false,
    ]);
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box">
        <div class="box-header with-border">
            <i class="glyphicon glyphicon-th-list"></i>
            <h3 class="box-title">จำนวนเครื่องที่ใช้ซอฟต์แวร์ทั้งหมด</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="batches-index">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'summary_id',
                        [
                            'attribute' => 'software_id',
                            'format' => 'text',
                            'label' => 'ชื่อซอฟต์แวร์',
                            'value' => 'software.software_name',
                            //'sort' => false
                            //'filter' => $dataProvider->software_id
                            'filter' => ArrayHelper::map(\common\models\Software::find()->all(), 'software_id', 'software_name')
                        ],
                        [
                            'attribute' => 'computer_id',
                            'format' => 'text',
                            'label' => 'ชื่อผู้ใช้',
                            'value' => 'computer.of_user',
                            'filter' => ArrayHelper::map(\common\models\ComputerVih::find()->all(), 'computer_id', 'of_user')
                        ],
                        [
                            'attribute' => 'created_by',
                            'format' => 'text',
                            'label' => 'สร้างโดย',
                            'value' => 'createdBy.username',
                        ],
                        [
                            'class' => '\pheme\grid\ToggleColumn',
                            'contentOptions' => ['class' => 'text-center'],
                            'attribute' => 'is_status',
                            'enableAjax' => false,
                            'value' => 'is_status',
                            'filter' => ['1' => 'InActive', '0' => 'Active']
                        // 'filter' => ArrayHelper::map(common\models\Software::find()->all(), 'software_id', 'software_id')
                        ],
                        //'updated_by',
                        //'created_at',
                        //'updated_at',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>