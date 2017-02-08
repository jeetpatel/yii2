<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Organization */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('app', 'Update {modelClass}: ', ['modelClass' => 'Organization',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$post = Yii::$app->request->post('Organization');
Common::$postData = (!empty($post)) ? $post : $model;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $form = ActiveForm::begin(['id' => 'organization']);

    echo $form->errorSummary($model);
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="status_name">Organization Name<span class="label-required">*</span></label>
            <input type="text" id="organization-name" class="form-control required" name="Organization[name]" 
                   maxlength="50" value="<?php echo Common::getValue('name');?>">
        </div>
        <div class="form-group field-firm-firm_type required">
            <label class="control-label" for="firm-firm">Firm<span class="label-required">*</span></label>
            <select name="Organization[firm_id]" class="form-control required">
                <option value="">Select Firm</option>
                <?php foreach ($firmTypes as $type) { ?>
                <option value="<?php echo $type['id']; ?>" <?php echo Common::setActive($type['id'], Common::getValue('firm_id')) ?>><?php echo $type['name']; ?></option>
                <?php } ?>
            </select>

            <div class="help-block"></div>
        </div>
        
        <div class="form-group field-firm-firm_type required">
            <label class="control-label" for="firm-firm_type">Organization Status Type<span class="label-required">*</span></label>
            <select name="Organization[status_id]" class="form-control required">
                <option value="">Select Organization Status</option>
                <?php foreach ($orgResult as $org) { ?>
                  <option value="<?php echo $org['id']; ?>" <?php echo Common::setActive($org['id'], Common::getValue('status_id')) ?>><?php echo $org['status_name']; ?></option>
                <?php } ?>
            </select>

            <div class="help-block"></div>
        </div>
        
        <div class="form-group">
            <label for="contract_start">Contract Start Date<span class="label-required">*</span></label>
            <input type="date" id="contract_start" class="form-control required" name="Organization[contract_start]" 
                   value="<?php echo Common::getValue('contract_start');?>">
        </div>
        
        <div class="form-group">
            <label for="contract_end">Contract End Date<span class="label-required">*</span></label>
            <input type="date" id="contract_end" class="form-control required" name="Organization[contract_end]" 
                  value="<?php echo Common::getValue('contract_end');?>">
        </div>
        
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo Html::button('Cancel', ['class'=>'btn bg-olive margin','onclick'=>"redirect('".Url::to(['organization/index'])."')"]); ?>
    </div>
<?php ActiveForm::end(); ?>
</div>

<script>
  jQuery(document).ready(function() {
		jQuery("#organization").validate();
  });
</script>

