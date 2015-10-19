<?php

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'th',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
//        'dateformatter' => [
//            'class' => 'app\components\DateFormat',
//        ],
//        'formatter' => [
//            'dateFormat' => 'dd-MM-yyyy',
//            'datetimeFormat' => 'php:d-m-Y H:i:s',
//            'timeFormat' => 'php:H:i:s',
//            'decimalSeparator' => ',',
//            'thousandSeparator' => ' ',
//            'currencyCode' => 'Rs.',
//            'class' => 'yii\i18n\Formatter',
//        ],
    /* 	'view' => [
      'theme' => [
      'pathMap' => [
      '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/phundament/app'
      ],
      ],
      ], */
    ],
];
