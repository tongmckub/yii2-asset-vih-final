<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = $model->software_id;
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->software_id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->software_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>
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
                    ],
                ])
                ?>
            </div>

            <div class="box box-success">
                <div class="box-header" id="callout-input-needs-type">
                    <h4 class="box-title">รายชื่อคอมพิวเตอร์ที่ใช้ Software นี้</h4>
                </div>
                <div class="box-body table-responsive">
                    <?php
                    $fcd_data = new frontend\models\SummaryOnSiteSearch();
                    $fcd_dataprovider = $fcd_data->get_fcd($_REQUEST['id']);
                    ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $fcd_dataprovider,
                        'summary' => '',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'fees_details_name',
                            'fees_details_description',
                            'fees_details_amount',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model) {
                                        $url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/update", "fcd_id" => $model->fees_category_details_id, "fcc_id" => $model->fees_details_category_id]);
                                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Update'),
                                        ]);
                                    },
                                            'delete' => function ($url, $model) {
                                        $url = \Yii::$app->getUrlManager()->createUrl(["fees/fees-category-details/delete", "fcd_id" => $model->fees_category_details_id, "fcc_id" => $model->fees_details_category_id]);
                                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                                    'title' => Yii::t('yii', 'Delete'),
                                                    'data' => [
                                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
