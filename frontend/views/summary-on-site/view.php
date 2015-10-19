<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */

$this->title = $model->summary_id;
$this->params['breadcrumbs'][] = ['label' => 'Summary On Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-on-site-view">

    <div class="col-xs-12">
    <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i>Summary <?= Html::encode($this->title) ?></h3></div>
    <div class="col-xs-4"></div>
    <div class="col-lg-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
        <div class="col-xs-6 col-sm-3 left-padding">
            <?= Html::a('กลับ', ['index'], ['class' => 'btn btn-block btn-back']) ?>
        </div>
        <div class="col-xs-6 col-sm-3 left-padding">
            <?= Html::a('Update', ['update', 'id' => $model->summary_id], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="col-xs-6 col-sm-1 left-padding">
          <?=
        Html::a('Delete', ['delete', 'id' => $model->summary_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
                            'summary_id',
                            'software.software_name',
                            'computer_id',
                            'createdBy.username',
                            'updatedBy.username',
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
            </div>
        </div>
    </div>
