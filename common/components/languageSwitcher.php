<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\Widget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;
use yii\web\Cookie;

class languageSwitcher extends Widget {
  /* ใส่ภาษาของคุณที่นี่ */

  public $languages = [
    'en-US' => 'English',
    'fr' => 'France',
  ];

  public function init() {
    if (php_sapi_name() === 'cli') {
      return true;
    }

    parent::init();
    $language = Yii::$app->request->get('language');
    if ($language) {
      Yii::$app->language = $language;
      $this->setLanguage($language);
    }
    else {
      Yii::$app->language = $this->getLanguage();
    }
  }

  /**
   * set language value
   * @param type $language
   */
  function setLanguage($language = null) {
    //IF language code does not define set default language
    if (empty($this->languages[$language])) {
      reset($this->languages);
      $language = key($this->languages);
      Yii::$app->language = $language;
    }
    $session = Yii::$app->session;
    $session->set('language', $language);
  }

  /**
   * get current language
   * @return type
   */
  function getLanguage() {

    $session = Yii::$app->session;
    $language = $session->get('language');
    Yii::$app->language = $language;
    return $language;
  }

  /**
   * execute on each request
   */
  public function run() {
    $languages = $this->languages;
    Yii::$app->language = $this->getLanguage();

    $current = (isset($languages[Yii::$app->language])) ? $languages[Yii::$app->language] : 'en-US';
    unset($languages[Yii::$app->language]);

    $items = [];
    foreach ($languages as $code => $language) {
      $temp = [];
      $temp['label'] = $language;
      $temp['url'] = Url::current(['language' => $code]);
      array_push($items, $temp);
    }
    //return $items;


    echo ButtonDropdown::widget([
      'label' => $current,
      'dropdown' => [
        'items' => $items,
      ],
    ]);
  }

}
