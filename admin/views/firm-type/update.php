<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\FirmType */

$this->title = 'Update Firm Type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Firm Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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
        <div class="row">
          <div class="col-md-6 form-group">
              <label for="firmtype-name">Firm Type Name<span class="label-required">*</span></label>
              <input type="text" id="firmtype-name" class="form-control required" name="FirmType[name]" maxlength="50" 
                     value="<?php echo $model->name; ?>">
          </div>
          <div class="col-md-6 form-group">
            <label class="control-label" for="status">Status</label>
            <select name="FirmType[status]" class="form-control">
                <option value="1" <?php echo Common::setActive($model->status,1); ?>>Active</option>
                <option value="2" <?php echo Common::setActive($model->status,2); ?>>Closed</option>
            </select>
        </div>
        </div>
         <div class="row">
          <div class="col-md-12 form-group">
              <label class="control-label" for="firmtype-description">Description</label>
              <input type="text" id="firmtype-description" value="<?php echo $model->description; ?>" class="form-control" name="FirmType[description]" maxlength="255">
          </div>
         </div>
        <div class="row">
        <div class="col-md-6 form-group">
            <label class="control-label" for="created-at">Created At</label>
            <?php echo Common::getFormatedDate($model->created_at,'d F,Y H:i:s A'); ?>
        </div>
        <div class="col-md-6 form-group">
            <label class="control-label" for="updated-at">Updated At</label>
            <?php echo Common::getFormatedDate($model->updated_at,'d F,Y H:i:s A'); ?>
        </div>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo Html::button('Cancel', ['class'=>'btn bg-olive','onclick'=>"redirect('".Url::to(['firm-type/index'])."')"]); ?>
    </div>
<?php ActiveForm::end(); ?>
</div>
    
<script>
  jQuery(document).ready(function() {
		jQuery("#firm-type").validate();
  });
</script>
