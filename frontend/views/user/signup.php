<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Common;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<div class="form-group field-signupform-first_name required">
<label class="control-label" for="signupform-first_name">First Name</label>
<input type="text" id="signupform-first_name" class="form-control" 
       name="SignupForm[first_name]" value="<?php echo $post['first_name']; ?>">
</div>

<div class="form-group field-signupform-last_name">
<label class="control-label" for="signupform-last_name">Last Name</label>
<input type="text" id="signupform-last_name" class="form-control" 
       name="SignupForm[last_name]" value="<?php echo $post['last_name']; ?>">
</div>

<?= $form->field($model, 'username'); ?>

                <?= $form->field($model, 'email'); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    &nbsp;&nbsp;
                    <a href="<?php echo Url::to(['user/login']); ?>">Already have Account</a><br>
                    <a href="<?php echo Yii::$app->homeUrl; ?>">Back to Home</a>                    
                </div>
                  
                  <?php ActiveForm::end(); ?>