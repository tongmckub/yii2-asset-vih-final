<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = "รายงานข้อมูลการใช้ซอฟต์แวร์";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-bar-chart"></i> รายงานข้อมูลการใช้ซอฟต์แวร์</h3>
            </div>
            <div class="box-body">

                <?php
//                $comStatusData[] = [
//		'type' => 'pie',
//		'name' => 'Total Students',
//		'data' => $comStatusLocal,
//		'center' => [70, 40],
//		'size' => 88,
//		'showInLegend' => false,
//		'dataLabels' => [
//			'enabled' => false,
//		],
//	];
                 echo Highcharts::widget([
//                    'scripts' => [
//                        //'modules/exporting',
//                        //'themes/grid-light',
//                        'highcharts-3d',
//                    ],
                    'options' => [
//                        'credits' => [
//                            'enabled' => false
//                        ],
//                        'exporting' => [
//                            'enabled' => false
//                        ],
//                        'chart' => [
//                            'type' => 'column',
//                            'options3d' => [
//                                'enabled' => true,
//                                'alpha' => 10,
//                                'beta' => 0,
//                                'viewDistance' => 25,
//                                'depth' => 100
//                            ],
//                            'marginTop' => 80,
//                            'marginRight' => 40
//                        ],
                        'title' => [
                            'text' => '',
                        ],
                        'xAxis' => [
                            'categories' => $softwareData,
                        ],
                        'yAxis' => [
                            'title' => [
                                'text' => 'จำนวนเครื่องคอมพิวเตอร์',
                            ]
                        ],
                        'series' => $comStatusData,
                    ]
                ]);
                 print_r($comStatusData); 
                ?>
            </div> <!--End Body--->
        </div> <!--End Box Info-->
    </div>
</div>

<div class="row">
    <?php
    echo Highcharts::widget([
   'options' => [
      'title' => ['text' => 'Fruit Consumption'],
      'xAxis' => [
         'categories' => ['Apples', 'Bananas', 'Oranges']
      ],
      'yAxis' => [
         'title' => ['text' => 'Fruit eaten']
      ],
      'series' => $comStatusData,
   ]
]);
    ?>
</div>

