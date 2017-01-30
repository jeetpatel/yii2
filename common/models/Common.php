<?php
namespace common\models;

use Yii;
use yii\base\Model;


class Common extends Model
{
  static function setActive() {
    $request = \Yii::$app->getRequest();
    echo "<pre>"; print_r($request); echo "</pre>";
  }

  
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
      
}
