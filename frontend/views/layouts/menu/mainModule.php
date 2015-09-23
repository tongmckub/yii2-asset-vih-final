<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
   <?php
	$isSupport = $isRole = NULL;

	if(!Yii::$app->user->isGuest){
	      $isSupport = Yii::$app->session->get('user_id');
	      echo $isRole = Yii::$app->session->get('role_name');
	}
	if(isset($isStudent))
	{
		$stuMaster = app\modules\student\models\StuMaster::find()->andWhere(['stu_master_id' => $isStudent])->one();
		if(!empty($stuMaster))
		      $stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $stuInfo->getStuPhoto($stuInfo->stu_photo);
	}
	else if(isset($isEmployee))
	{
		$empMaster = app\modules\employee\models\EmpMaster::find()->andWhere(['emp_master_id' => $isEmployee])->one();
		if(!empty($empMaster))
		      $empInfo = app\modules\employee\models\EmpInfo::findOne($empMaster->emp_master_emp_info_id);
		else
		      throw new app\web\NotFoundHttpException('The requested user login credentials does not exist.');
		$Photo = $empInfo->getEmpPhoto($empInfo->emp_photo);
	}
	else {
		$Photo = Yii::getAlias('@web'). '/data/emp_images/no-photo.png';
	}
   ?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $Photo ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p> Welcome, <?= @Yii::$app->user->identity->username ?></p>
                </div>
            </div>
        <?php endif; ?>

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu </span>
                </a>
            </li>
	<?php if($isRole != null) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>ตั่งค่า</span>', ['/default/index']); ?></li>
	<?php } 
	      if($isRole != null) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>หน้าแรก</span>', ['/software/index']); ?></li>
	<?php }
	      if($isRole != null) {
	?>
	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>Course Management</span>', ['/course/default/index']);?></li>
	<?php }
	      if($isRole != null) {
	?>
	    <li><?= Html::a('<i class="fa fa-users"></i> <span>Student</span>', ['/student/default/index']);  ?></li>
	<?php }
	      if($isRole != null) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>Employee</span>', ['/employee/default/index']);  ?></li>
              <?php }?>
        </ul>
              <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-folder-open"></i> <span>ตั่งค่า</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= \yii\helpers\Url::to(['/division/index']) ?>"><span class="fa fa-edit"></span> เพิ่มแผนก</a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['/software/index']) ?>"><span class="glyphicon glyphicon-menu-hamburger"></span> เพิ่มซอฟแวร์</a>
                    </li>
                </ul>
            </li>
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
