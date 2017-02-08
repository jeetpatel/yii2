<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\OrganizationStatus */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('app', 'Update Organization Status').' : '.$model->status_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$post = Yii::$app->request->post('OrganizationStatus');
Common::$postData = (!empty($post)) ? $post : $model;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $form = ActiveForm::begin(['id' => 'organization-status']);

    echo $form->errorSummary($model);
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="status_name">Organization Status<span class="label-required">*</span></label>
            <input type="text" id="organization-status-name" class="form-control required" name="OrganizationStatus[status_name]" 
                   maxlength="50" value="<?php echo Common::getValue('status_name');?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="organization-status-description">Description</label>
            <input type="text" id="organization-status-description" class="form-control" name="OrganizationStatus[status_description]" 
                   maxlength="255" value="<?php echo Common::getValue('status_description');?>">
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo Html::button('Cancel', ['class'=>'btn bg-olive margin','onclick'=>"redirect('".Url::to(['organization-status/index'])."')"]); ?>
    </div>
<?php ActiveForm::end(); ?>
</div>

<script>
  jQuery(document).ready(function() {
		jQuery("#organization-status").validate();
  });
</script>
