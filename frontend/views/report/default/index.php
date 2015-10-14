<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\helpers\VarDumper;

$this->title = "รายงานข้อมูลการใช้ซอฟต์แวร์";
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
//$this->registerJsFile('http://code.highcharts.com/mapdata/countries/de/de-all.js', [
//    'depends' => 'miloschuman\highcharts\HighchartsAsset'
//]);

//$totalP = array_map('intVal', $totalCountP); 
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
                    'scripts' => [
                       // 'modules/exporting',
                       // 'themes/grid-light',
                        'highcharts-3d',
                    ],
                    'options' => [
                        'credits' => [
                            'enabled' => false
                        ],
                        'exporting' => [
                            'enabled' => false
                        ],
                        'chart' => [
                            'type' => 'column',
                            'options3d' => [
                                'enabled' => true,
                                'alpha' => 10,
                                'beta' => 0,
                                'viewDistance' => 25,
                                'depth' => 100
                            ],
                            'marginTop' => 80,
                            'marginRight' => 40
                        ],
                        'title' => [
                            'text' => 'ซอฟต์แวร์ทั้งหมด',
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
//                
//                echo Highcharts::widget([
//                    'scripts' => [
//                        'modules/exporting',
//                        'themes/grid-light',
//                    ],
//                    'options' => [
//                        'title' => [
//                            'text' => 'Project chart',
//                        ],
//                        'xAxis' => [
//                            'categories' => $softwareData, //month
//                        ],
//                        'yAxis' => [
//                            'title' => [
//                                'text' => 'Count',
//                            ],
//                        ],
//                        'series' => [
//                            [
//                                'type' => 'column',
//                                'name' => 'Project',
//                                'data' => $comStatusData,
//                            ],
//                        ],
//                    ]
//                ]);

               // print_r($comStatusData);
               // VarDumper::dump($comStatusData,1, true);
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
            'series' => [
                ['name' => 'Jane', 'data' => [1, 0, 4]],
                ['name' => 'John', 'data' => [5, 7, 3]]
            ]
        ]
    ]);
    
//    $a = '5';
//    var_dump($a);
//    
//    $b=(int)$a;
//     var_dump($b);
    ?>
</div>

