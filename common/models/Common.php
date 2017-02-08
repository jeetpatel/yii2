<?php
namespace common\models;

use Yii;
use yii\base\Model;


class Common extends Model
{
  static $postData = [];
  static function getFlash($key) {
    if (!Yii::$app->session->hasFlash($key)): 
      return false;
    endif;
   
    $messageClass = 'primary';
   $message = Yii::$app->session->getFlash($key); 
   if ($key=='error')
   {
     $messageClass = 'danger';
   }
   elseif ($key=='success')
   {
     $messageClass = 'success';
   }
   elseif ($key=='warning')
   {
     $messageClass = 'warning';
   }
   elseif ($key=='info')
   {
     $messageClass = 'info';
   }
  
   $message = '<div class="box box-solid box-'.$messageClass.'">
      <div class="box-header">
        <h3 class="box-title">'.$message.'</h3>
      </div>       
    </div>';
   return $message;
  }
  
  static function getFormatedDate($timestamp,$format='d F,Y') {
    if (!empty($timestamp)) {
      return date($format,$timestamp);
    } else {
      return false;
    }
  }
  
  static function getStatus($status) {
    $text = '';
    switch ($status) {
      case 1:
      case 10:
      $text = 'Active';
      break;
      case 2:
      $text = 'Closed';
      break;
      case 3:
      $text = 'Inactive';     
      break;
    }
    return $text;
  }
  
  static function setActive($val1,$val2) {
    if ($val1==$val2)
      return 'selected="true"';
    else
      return false;
  }

  static function isRegistered($val1,$val2) {
    if ($val1==$val2)
      return 'checked';
    else
      return false;
  }
  /**
   * get value from array by key and return value
   * @param type $key
   * @return string
   */
  static function getValue($key) {
    //for the array data
    if (isset(self::$postData->$key))
    {
      return self::$postData->$key;
    }
    //for the array data
    if (isset(self::$postData[$key]))
    {
      return self::$postData[$key];
    } else {
      return '';
    }
  }
      
}
