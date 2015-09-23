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
            <li>
                <a href="<?= Yii::$app->homeUrl ?>" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu </span>
                </a>
            </li>
            
            <?php 
            if (!Yii::$app->user->isGuest) {
                    $isSupport = Yii::$app->session->get('user_id');
                    echo $isRole = Yii::$app->session->get('role_name');
                    
                   if ($this->context->module->id == 'software')
	         echo $this->render('menu/dashboard');
                    
                    
                }
            
            ?>

        </ul>

    </section>

</aside>
