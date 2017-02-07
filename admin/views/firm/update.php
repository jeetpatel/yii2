<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model backend\models\Firm */

$this->title = 'Update Firm: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Firms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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

//    echo $form->errorSummary($model);
    ?>
    <div class="box-body">
        <div class="form-group">
            <label for="firmtype-name">Firm Type Name<span class="label-required">*</span></label>
            <input type="text" id="firmtype-name" class="form-control" name="FirmType[name]" maxlength="50" 
                   required="true" value="<?php echo $model->firm_name; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="status">Status</label>
            <select name="FirmType[status]" class="form-control">
                <option value="1" <?php echo Common::setActive($model->status,1); ?>>Active</option>
                <option value="2" <?php echo Common::setActive($model->status,2); ?>>Closed</option>
            </select>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
<?php ActiveForm::end(); ?>
</div>

<div class="box box-primary">
<div class="firm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>