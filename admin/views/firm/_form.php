<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Firm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="firm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firm_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firm_type')->textInput() ?>

    <?= $form->field($model, 'is_registered')->textInput() ?>

    <?= $form->field($model, 'vat_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cst_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gst_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pan_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tan_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_tax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primary_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin_code')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
