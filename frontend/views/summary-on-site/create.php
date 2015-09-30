<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SummaryOnSite */
$software_id = Yii::$app->getRequest()->get('s_id');
$this->title = 'เพิ่มชื่อคอมพิวเตอร์ - '.$software_id;
$this->params['breadcrumbs'][] = ['label' => 'เพิ่มชื่อคอมพิวเตอร์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-on-site-create">

    <div class="col-xs-12">
        <div class="col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-plus"></i> <?= Html::encode($this->title) ?></h3></div>
    </div>

    <?=
    $this->render('_form', [
        'model' => $model,
        'computer' => $computer,
        'software' => $software,
    ])
    ?>

</div>
