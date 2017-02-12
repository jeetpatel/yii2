<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
//use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Partner */
/* @var $form yii\widgets\ActiveForm */

 $form = ActiveForm::begin([
    'fieldConfig' => ['options' => ['class' => 'form-group col-md-6']],
]); 
$firmList = []; 
foreach ($firmResult as $result) {
  $firmList[$result->id] = $result->firm_name;
}

$orgList = []; 
foreach ($orgResult as $result) {
  $orgList[$result->id] = $result->name;
}

$statusList = []; 
foreach ($pStatusResult as $result) {
  $statusList[$result->id] = $result->status_name;
}
 
 ?>
<div class="box-body">    
<div class="row">
    <?= $form->field($model, 'firm_id')->dropDownList($firmList,[$model->firm_id]) ?>
    <?= $form->field($model, 'organization_id')->dropDownList($orgList,[$model->organization_id]) ?>
</div>
<div class="row">
    <?= $form->field($model, 'partner_status_id')->dropDownList($statusList,[$model->partner_status_id]) ?>
    <?= $form->field($model, 'contract_start')->input('date') ?>
</div>
<div class="row">    
    <?= $form->field($model, 'contract_end')->input('date') ?>
    
    <?php
//     echo DatePicker::widget([
//               'model' => $model,
//               'attribute' => 'contract_end',
//               'language' => 'en',
//               'dateFormat' => 'yyyy-MM-dd',
//           ]);
     ?>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php echo Html::button('Cancel', ['class'=>'btn bg-olive','onclick'=>"redirect('".Url::to(['partner/index'])."')"]); ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>
