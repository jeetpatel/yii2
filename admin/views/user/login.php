<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\bootstrap\ActiveForm;
use yii\web\Session;
use app\models\Common;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('error')): 
  
  echo Common::getFlash('error');
  ?>

<?php endif; ?>
<?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
      <div class="form-group has-feedback">
          <input required="true" autocomplete="off" type="text" name="LoginForm[username]" class="form-control" placeholder="User Name" maxlength="30">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input required="true" type="password" autocomplete="off" name="LoginForm[password]" class="form-control" placeholder="Password" maxlength="30">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
           <div class="col-xs-8">
         <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"\">{error}</div>",
        ]) ?>
           </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
<?php ActiveForm::end(); ?>
