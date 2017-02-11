<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
  'id' => 'app-backend',
  'basePath' => dirname(__DIR__),
  'controllerNamespace' => 'backend\controllers',
  'bootstrap' => ['log'],
  'modules' => [],
  'defaultRoute' => 'user/index',
  'components' => [
    'user' => [
      'identityClass' => 'common\models\User',
      'enableAutoLogin' => true,
      'loginUrl' => [ 'user/login'],
    ],
    'session' => [
            'name' => '_adminSessionId',
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
    'assetManager' => [
      'class' => 'yii\web\AssetManager',
      'forceCopy' => true,  
       'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,   // do not publish the bundle
                    'js' => [],
                ],
                 'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
               ],
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
    ],
    'cache' => array(
      'class' => ''
    ),
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
