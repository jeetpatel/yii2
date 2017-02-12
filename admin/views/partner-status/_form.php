<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PartnerStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'fieldConfig' => ['options' => ['class' => 'form-group col-md-6']],
]); ?>

<div class="box-body">
    <div class="row">
      <?= $form->field($model, 'status_name')->textInput(['maxlength' => true])->label(Yii::t('app', 'Status Name <span class="red">*</span>')); ?>
      <?= $form->field($model, 'status_description')->textInput(['maxlength' => true]) ?>
    </div>
</div>

 <div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php echo Html::button('Cancel', ['class'=>'btn bg-olive','onclick'=>"redirect('".Url::to(['partner-status/index'])."')"]); ?>
</div>
 <?php ActiveForm::end(); ?>