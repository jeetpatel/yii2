<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model backend\models\Firm */

$this->title = 'Create Firm';
$this->params['breadcrumbs'][] = ['label' => 'Firms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
Common::$postData = Yii::$app->request->post('Firm');
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <?php
    $form = ActiveForm::begin(['id' => 'firm']);

    echo $form->errorSummary($model);
    ?>
<div class="box-body">    
<div class="form-group field-firm-firm_name required">
<label class="control-label" for="firm-firm_name">Firm Name</label>
<input type="text" id="firm-firm_name" class="form-control" name="Firm[firm_name]" 
       maxlength="50" value="<?php echo Common::setValue('firm_name'); ?>">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-firm_type required">
<label class="control-label" for="firm-firm_type">Firm Type</label>
<select name="Firm[firm_type]" class="form-control required">
    <option value="">Select Firm Type</option>
    <?php foreach($firmTypes as $type) { ?>
    <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
    <?php } ?>
</select>

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-is_registered">
<label class="control-label" for="firm-is_registered">Is Registered</label>
<input type="text" id="firm-is_registered" class="form-control" name="Firm[is_registered]">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-vat_number">
<label class="control-label" for="firm-vat_number">Vat Number</label>
<input type="text" id="firm-vat_number" class="form-control" name="Firm[vat_number]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-cst_number">
<label class="control-label" for="firm-cst_number">Cst Number</label>
<input type="text" id="firm-cst_number" class="form-control" name="Firm[cst_number]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-gst_number">
<label class="control-label" for="firm-gst_number">Gst Number</label>
<input type="text" id="firm-gst_number" class="form-control" name="Firm[gst_number]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-pan_number">
<label class="control-label" for="firm-pan_number">Pan Number</label>
<input type="text" id="firm-pan_number" class="form-control" name="Firm[pan_number]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-tan_number">
<label class="control-label" for="firm-tan_number">Tan Number</label>
<input type="text" id="firm-tan_number" class="form-control" name="Firm[tan_number]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-service_tax">
<label class="control-label" for="firm-service_tax">Service Tax</label>
<input type="text" id="firm-service_tax" class="form-control" name="Firm[service_tax]" maxlength="20">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-primary_contact required">
<label class="control-label" for="firm-primary_contact">Primary Contact</label>
<input type="text" id="firm-primary_contact" class="form-control" name="Firm[primary_contact]" maxlength="12">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-primary_email required">
<label class="control-label" for="firm-primary_email">Primary Email</label>
<input type="text" id="firm-primary_email" class="form-control" name="Firm[primary_email]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-address_1 required">
<label class="control-label" for="firm-address_1">Address 1</label>
<input type="text" id="firm-address_1" class="form-control" name="Firm[address_1]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-address_2">
<label class="control-label" for="firm-address_2">Address 2</label>
<input type="text" id="firm-address_2" class="form-control" name="Firm[address_2]" maxlength="255">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-district required">
<label class="control-label" for="firm-district">District</label>
<input type="text" id="firm-district" class="form-control" name="Firm[district]" maxlength="50">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-state required">
<label class="control-label" for="firm-state">State</label>
<input type="text" id="firm-state" class="form-control" name="Firm[state]" maxlength="50">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-pin_code required">
<label class="control-label" for="firm-pin_code">Pin Code</label>
<input type="text" id="firm-pin_code" class="form-control" name="Firm[pin_code]">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-longitude">
<label class="control-label" for="firm-longitude">Longitude</label>
<input type="text" id="firm-longitude" class="form-control" name="Firm[longitude]">

<div class="help-block"></div>
</div>
    <div class="form-group field-firm-latitude">
<label class="control-label" for="firm-latitude">Latitude</label>
<input type="text" id="firm-latitude" class="form-control" name="Firm[latitude]">

<div class="help-block"></div>
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
		jQuery("#firm").validate();
  });
</script>

<?php /*
<div class="firm-create">

    <h1><?php 
    
    echo Html::encode($this->title) ?>
    </h1>

    <?php
    
    echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
*/?>