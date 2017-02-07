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
            <td>Firm Name</td>
            <td><?php echo $result[0]['firm_name']; ?></td>
        </tr>
        <tr>
            <td>Firm Type</td>
            <td><?php echo ($result[0]['name']) ? $result[0]['name'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo ($result[0]['name']) ? $result[0]['name'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo ($result[0]['description']) ? $result[0]['description'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Is Registered</td>
            <td><?php echo ($result[0]['is_registered']) ? 'True' : 'False'; ?></td>
        </tr>
        <tr>
            <td>VAT Number</td>
            <td><?php echo ($result[0]['vat_number']) ? $result[0]['vat_number'] : '-'; ?></td>
        </tr>
        <tr>
            <td>CST Number</td>
            <td><?php echo ($result[0]['cst_number']) ? $result[0]['cst_number'] : '-'; ?></td>
        </tr>
        <tr>
            <td>GST Number</td>
            <td><?php echo ($result[0]['gst_number']) ? $result[0]['gst_number'] : '-'; ?></td>
        </tr>
        <tr>
            <td>PAN Number</td>
            <td><?php echo ($result[0]['pan_number']) ? $result[0]['pan_number'] : '-'; ?></td>
        </tr>
        <tr>
            <td>TAN Number</td>
            <td><?php echo ($result[0]['tan_number']) ? $result[0]['tan_number'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Service Tax</td>
            <td><?php echo ($result[0]['service_tax']) ? $result[0]['service_tax'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Primary Contact</td>
            <td><?php echo ($result[0]['primary_contact']) ? $result[0]['primary_contact'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Primary Email</td>
            <td><?php echo ($result[0]['primary_email']) ? $result[0]['primary_email'] : '-'; ?></td>
        </tr>
        <tr>
            <td>ADDRESS 1</td>
            <td><?php echo ($result[0]['address_1']) ? $result[0]['address_1'] : ''; ?></td>
        </tr>
        <tr>
            <td>ADDRESS 2</td>
            <td><?php echo ($result[0]['address_2']) ? $result[0]['address_2'] : ''; ?></td>
        </tr>
        <tr>
            <td>District</td>
            <td><?php echo ($result[0]['district']) ? $result[0]['district'] : '-'; ?></td>
        </tr>
        <tr>
            <td>State</td>
            <td><?php echo ($result[0]['state']) ? $result[0]['state'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Pin Code</td>
            <td><?php echo ($result[0]['pin_code']) ? $result[0]['pin_code'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Longitude</td>
            <td><?php echo ($result[0]['longitude']) ? $result[0]['longitude'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Latitude</td>
            <td><?php echo ($result[0]['latitude']) ? $result[0]['latitude'] : '-'; ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo Common::getStatus($result[0]['status']); ?></td>
        </tr>
        <tr>
            <td>Created At</td>
            <td><?php echo Common::getFormatedDate($result[0]['created_at'],'d F,Y H:i:s A'); ?></td>
        </tr>
        <tr>
            <td>Updated At</td>
            <td><?php echo Common::getFormatedDate($result[0]['updated_at'],'d F,Y H:i:s A'); ?></td>
        </tr>
        <tr>
            <td>
              <a href="<?php echo Url::to(['firm/index']); ?>">Back</a>
            </td>
            <td>
            </td>
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
