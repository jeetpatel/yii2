<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LusU0Wl3yXY28cjoCNzvYsGQhTDmu_CA',
        ],
    ],
];

if (YII_ENV) {
  // configuration adjustments for 'dev' environment
  if (YII_DEBUG==true) {
    $config['bootstrap'][] = 'debug';
  } 
  $config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
  ];

  //$config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
  ];
}

return $config;
