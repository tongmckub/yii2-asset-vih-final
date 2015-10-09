<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = $model->software_name;
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
    <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i><?= Html::encode($this->title) ?></h3></div>
    <div class="col-xs-4"></div>
    <div class="col-lg-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
        <div class="col-xs-6 col-sm-3 left-padding">
            <?= Html::a('กลับ', ['index'], ['class' => 'btn btn-block btn-back']) ?>
        </div>
        <div class="col-xs-6 col-sm-3 left-padding">
            <?= Html::a('แก้ไข', ['update', 'id' => $model->software_id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-xs-6 col-sm-1 left-padding">
            <?=
            Html::a('ลบ', ['delete', 'id' => $model->software_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'คุณต้องการลบรายชื่อซอฟต์แวร์นี้ออก แน่หรือไม่?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>
</div>

<div class="software-view">

    <div class="col-xs-12">
        <div class="box box-primary view-item" style="padding-bottom:5px">
            <div class="fees-collect-category-view">
                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'software_id',
                        'software_name',
                        'software_detail:ntext',
                        [
                            'label' => 'เพิ่มโดย',
                            'attribute' => 'createdBy.username',
                        ],
                        [
                            'label' => 'แก้ไขโดย',
                            'attribute' => 'updatedBy.username',
                        ],
                        [
                            'attribute' => 'created_at',
                            'value' => Yii::$app->formatter->asDateTime($model->created_at),
                        ],
                        [
                            'attribute' => 'updated_at',
                            'value' => Yii::$app->formatter->asDateTime($model->updated_at),
                        ],
                        [
                            'attribute' => 'is_status',
                            'value' => ($model->is_status == 0) ? "<span class='label label-success'> Active </span>" : "<span class='label label-danger'> Inactive </span>",
                            'format' => 'raw',
                        ],
                    ],
                ])
                ?>
            </div>

            <div class="box box-success">
                <div class="box-header" id="callout-input-needs-type">
                    <h4 class="box-title">รายชื่อคอมพิวเตอร์</h4>
                </div>
                <div class="box-body table-responsive">
                    <?php
                    $sos_data = new frontend\models\SummaryOnSiteSearch();
                    $sos_dataprovider = $sos_data->get_sos($_REQUEST['id']);
                    ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $sos_dataprovider,
                        'summary' => '',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'computer.asset_code',
                            'computer.computer_name',
                            'computer.of_user',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        $url = \Yii::$app->getUrlManager()->createUrl(["computer-vih/update", "id" => $model->computer_id]);
                                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Update'),
                                        ]);
                                    },
                                            'delete' => function ($url, $model) {
                                        $url = \Yii::$app->getUrlManager()->createUrl(["summary-on-site/delete", "id" => $model->summary_id]);
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Delete'),
                                                    'data' => [
                                                        'confirm' => Yii::t('app', 'คุณต้องการลบรายชื่อคอมพิวเตอร์นี้ออก แน่หรือไม่?'),
                                                        'method' => 'post',
                                        ]]);
                                    }
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                </div>
            </div>


        </div>
    </div>
</div>
