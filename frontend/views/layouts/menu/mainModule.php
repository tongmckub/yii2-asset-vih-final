<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
<?php
$isSupport = $isRole = NULL;

if (!Yii::$app->user->isGuest) {
    $isSupport = Yii::$app->session->get('user_id');
    echo $isRole = Yii::$app->session->get('role_name');
}
if (isset($isStudent)) {
    $stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
    if (!empty($stuMaster))
        $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
    else
        throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
    $Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
}
else if (isset($isEmployee)) {
    $empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
    if (!empty($empMaster))
        $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
    else
        throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
    $Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
}
else {
    $Photo = Yii::getAlias('@web') . '/data/emp_images/no-photo.png';
}
?>

           <?= $this->render(
            '..\left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

