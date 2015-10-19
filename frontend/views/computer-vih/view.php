<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ComputerVih */

$this->title = 'Computer_id'." ".$model->computer_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'จัดการคอมพิวเตอร์'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computer-vih-view">

    <div class="col-xs-12">
        <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i><?= Html::encode($this->title) ?></h3></div>
        <div class="col-xs-4"></div>
        <div class="col-lg-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
            <div class="col-xs-6 col-sm-3 left-padding">
                <?= Html::a('กลับ', ['index'], ['class' => 'btn btn-block btn-back']) ?>
            </div>
            <div class="col-xs-6 col-sm-3 left-padding">
                <?= Html::a('แก้ไข', ['update', 'id' => $model->computer_id], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-xs-6 col-sm-1 left-padding">
                <?=
                Html::a('ลบ', ['delete', 'id' => $model->computer_id], [
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
                            'computer_id',
                            'asset_code',
                            'party.party_name',
                            'department.department_name',
                            'of_user',
                            'serial_no',
                            'computerLocaltion.localtion_alias',
                            'computer_name',
                            'ip',
                            'mac_address',
                            'createdBy.username',
                            'updatedBy.username',
                            [
                            'attribute' => 'is_status',
                            'value' => ($model->is_status == 0) ? "<span class='label label-success'> Active </span>" : "<span class='label label-danger'> Inactive </span>",
                            'format' => 'raw',
                        ],
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
