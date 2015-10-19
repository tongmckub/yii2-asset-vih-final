<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>
<aside class="right-side">
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => ['label' => '<i class="fa fa-dashboad"></i> หน้าแรก','encode' => FALSE, 'url' => Yii::$app->homeUrl],
            ]
        ) ?>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

   <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?// date('Y') ?></p>

            <p class="pull-right"><?// Yii::powered() ?></p>
        </div>
    </footer>

</aside>