<?php

use yii\helpers\Html;
?>

<ul class="dropdown-menu">
    <li>
        <ul class="menu">
            <li>
                <?= Html::a('<i class="fa fa-users text-orange fa-2x"></i> <h4>เพิ่มคอมพิวเตอร์</h4>', ['computer-vih/index']); ?>
            </li>
            
            <li>
                <?= Html::a('<i class="fa fa-cogs text-aqua fa-2x"></i><h4> เพิ่มแผนก</h4>', ['/department/index']); ?>
            </li>

            <li>
                <?= Html::a('<i class="fa fa-dashboard text-green fa-2x"></i> <h4>เพิ่มเครื่องเข้า Group</h4>', ['summary-on-site/index']); ?>
            </li>
            
             <li>
                <?= Html::a('<i class="fa fa-cogs text-aqua fa-2x"></i><h4> รายงาน</h4>', ['/report/default/index']); ?>
            </li>

        </ul>
    </li>
</ul>
