<?php

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model backend\models\Firm */

$this->title = (isset($result[0]['firm_name'])) ? $result[0]['firm_name'] : 'View';
$this->params['breadcrumbs'][] = ['label' => 'Firms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
    <?php if (count($result)>0) { ?>
    <table class="table table-striped">
        <tr>
            <th>Firm Name</th>
            <td><?php echo $result[0]['firm_name']; ?></td>
            <th>Firm Type</th>
            <td><?php echo ($result[0]['firm_type']) ? $result[0]['firm_type'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo ($result[0]['name']) ? $result[0]['name'] : '-'; ?></td>
            <th>Description</th>
            <td><?php echo ($result[0]['description']) ? $result[0]['description'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Is Registered</th>
            <td><?php echo ($result[0]['is_registered']) ? 'True' : 'False'; ?></td>
            <th>VAT Number</th>
            <td><?php echo ($result[0]['vat_number']) ? $result[0]['vat_number'] : '-'; ?></td>
        </tr>
        <tr>
            <th>CST Number</th>
            <td><?php echo ($result[0]['cst_number']) ? $result[0]['cst_number'] : '-'; ?></td>
            <th>GST Number</th>
            <td><?php echo ($result[0]['gst_number']) ? $result[0]['gst_number'] : '-'; ?></td>
        </tr>
        <tr>
            <th>PAN Number</th>
            <td><?php echo ($result[0]['pan_number']) ? $result[0]['pan_number'] : '-'; ?></td>
            <th>TAN Number</th>
            <td><?php echo ($result[0]['tan_number']) ? $result[0]['tan_number'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Service Tax</th>
            <td><?php echo ($result[0]['service_tax']) ? $result[0]['service_tax'] : '-'; ?></td>
            <th>Primary Contact</th>
            <td><?php echo ($result[0]['primary_contact']) ? $result[0]['primary_contact'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Primary Email</th>
            <td><?php echo ($result[0]['primary_email']) ? $result[0]['primary_email'] : '-'; ?></td>
            <th>ADDRESS 1</th>
            <td><?php echo ($result[0]['address_1']) ? $result[0]['address_1'] : ''; ?></td>
        </tr>
        <tr>
            <th>ADDRESS 2</th>
            <td><?php echo ($result[0]['address_2']) ? $result[0]['address_2'] : ''; ?></td>
            <th>District</th>
            <td><?php echo ($result[0]['district']) ? $result[0]['district'] : '-'; ?></td>
        </tr>
        <tr>
            <th>State</th>
            <td><?php echo ($result[0]['state']) ? $result[0]['state'] : '-'; ?></td>
            <th>Pin Code</th>
            <td><?php echo ($result[0]['pin_code']) ? $result[0]['pin_code'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Longitude</th>
            <td><?php echo ($result[0]['longitude']) ? $result[0]['longitude'] : '-'; ?></td>
            <th>Latitude</th>
            <td><?php echo ($result[0]['latitude']) ? $result[0]['latitude'] : '-'; ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo Common::getStatus($result[0]['status']); ?></td>
            <th>Created At</th>
            <td><?php echo Common::getFormatedDate($result[0]['created_at'],'d F,Y H:i:s A'); ?></td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td colspan="3"><?php echo Common::getFormatedDate($result[0]['updated_at'],'d F,Y H:i:s A'); ?></td>
        </tr>
    </table>
    <table class="table table-striped">
        <tr>
            <th><a href="<?php echo Url::to(['firm/index']); ?>">Back</a></th>
        </tr>
    </table>
    <?php 
    } ?>

</div>   

    <?php
    
//    DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'firm_name',
//            'firm_type',
//            'is_registered',
//            'vat_number',
//            'cst_number',
//            'gst_number',
//            'pan_number',
//            'tan_number',
//            'service_tax',
//            'primary_contact',
//            'primary_email:email',
//            'address_1',
//            'address_2',
//            'district',
//            'state',
//            'pin_code',
//            'longitude',
//            'latitude',
//            'status',
//            'created_at',
//            'updated_at',
//        ],
//    ]);
    
    ?>

</div>
