<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
  'id' => 'app-frontend',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'controllerNamespace' => 'frontend\controllers',
  'defaultRoute' => 'user/index',
  'components' => [
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
      'loginUrl' => [ 'user/login'],
    ],
    'session' => [
            'name' => '_frontendSessionId',
            'savePath' => __DIR__ . '/../runtime/sessions',
            'cookieParams' => [
                'path' => '/',
            ],
        ],
    'log' => [
      'traceLevel' => YII_DEBUG ? 3 : 0,
      'targets' => [
        [
          'class' => 'yii\log\FileTarget',
          'levels' => ['error', 'warning'],
        ],
      ],
    ],
//    'assetManager' => [
//      'bundles' => [
//        'yii\web\JqueryAsset' => [
//          'js' => []
//        ],
//        'yii\bootstrap\BootstrapPluginAsset' => [
//          'js' => []
//        ],
//        'yii\bootstrap\BootstrapAsset' => [
//          'css' => [],
//        ],
//      ],
//    ],
    'errorHandler' => [
      'errorAction' => 'site/error',
    ],
    'urlManager' => [
      'enablePrettyUrl' => true,
      'showScriptName' => false,
      'rules' => [
      ],
    ],
  ],
  'params' => $params,
];
