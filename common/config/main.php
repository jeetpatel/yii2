<?php
return [
  'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  'bootstrap' => [
        'languageSwitcher',
    ],
  'components' => [
    'cache' => [
      'class' => '',
    ],
    'languageSwitcher' => [
      'class' => 'common\components\languageSwitcher',
    ],
    'i18n' => [
      'translations' => [
        'app*' => [
          'class' => 'yii\i18n\PhpMessageSource',
          'basePath' => '@common/language',
          'sourceLanguage' => ['en','fr'],
          'fileMap' => [
            'app' => 'app.php',
            'app/error' => 'error.php',
          ],
          //'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']
        ],
      ],
    ],
  ],
];
