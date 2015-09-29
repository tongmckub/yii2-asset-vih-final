<?php

use yii\bootstrap\Nav;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
?>

<?php
$isSupport = NULL;

if (!Yii::$app->user->isGuest) {
    echo $isSupport = Yii::$app->session->get('id');
}
?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?= @Yii::$app->user->identity->username ?></p>
                    <a href="<?= $directoryAsset ?>/#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>
        
        <!-- You can delete next ul.sidebar-menu. It's just demo. -->

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

    </section>

</aside>
