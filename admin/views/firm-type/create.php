<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\FirmType;

/* @var $this yii\web\View */
/* @var $model backend\models\FirmType */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = 'Add Firm Type';
$this->params['breadcrumbs'][] = ['label' => 'Firm Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $form = ActiveForm::begin(['id' => 'firm-type']);

    echo $form->errorSummary($model);
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="firmtype-name">Firm Type Name<span class="label-required">*</span></label>
            <input type="text" id="firmtype-name" class="form-control required" name="FirmType[name]" maxlength="50" 
                   >
        </div>
        <div class="form-group">
            <label class="control-label" for="firmtype-description">Description</label>
            <input type="text" id="firmtype-description" class="form-control" name="FirmType[description]" maxlength="255">
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
<?php ActiveForm::end(); ?>
</div>

<script>
  jQuery(document).ready(function() {
		jQuery("#firm-type").validate();
  });
</script>


