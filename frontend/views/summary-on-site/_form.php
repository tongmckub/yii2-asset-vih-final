<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ComputerVih;
use common\models\Software;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */
/* @var $form yii\widgets\ActiveForm */
$get_software_id = Yii::$app->getRequest()->get('s_id');
?>

<div class="col-xs-12 col-lg-12">
    <div class="box-success box view-item col-xs-12 col-lg-12">
        <div class="summary-on-site-form">
            <div class="box box-solid box-info col-xs-12 col-lg-12 no-padding">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-info-circle"></i><?php
                        $softwareData = Software::find()->where('software_id =' . $get_software_id)->asArray()->one();
                        echo "&nbsp" . $softwareData['software_name'];
                        ?></h4>
                </div>
                <?php $form = ActiveForm::begin(); ?>
                <div class="form-group">
                    <?php
                    print_r($computerReg); 
                    echo maksyutin\duallistbox\Widget::widget([
                        'model' => $model,
                        'attribute' => 'computer_id',
                        'title' => 'Listbox',
                        'data' => $computer,                                                                                                                                                                                           
                        'data_id' => 'computer_id',    //สิ่งที่เก็บลงฐานข้อมุล
                        'data_value' => 'computer_id', //สิ่งที่แสดง
                        'lngOptions' => [
                            'warning_info' => 'แจ้งเตือน..',
                            'search_placeholder' => 'ค้นหาเครื่อง',
                            'showing' => 'จำนวน',
                            'available' => 'เครื่องทั้งหมด', //title ที่ยังไม่เลือก
                            'selected' => 'เครื่องที่เลือก'    //title ที่เลือก
                        ]
                    ]);
                    ?>
                </div>
                <div class="center">
                    <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php //echo $form->field($model, 'computer_id')->textInput() ?>
            </div>
        </div>
    </div>
</div>
