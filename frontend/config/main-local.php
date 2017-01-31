<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'XJizHthjOH2rTh_lg7jf2q64-R9ONaKg',
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
