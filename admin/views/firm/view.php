<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            <td><?php echo $result[0]['name']; ?></td>
        </tr>
        <tr>
            <td>Firm Name</td>
            <td><?php echo $result[0]['firm_name']; ?></td>
        </tr>
    </table>
    <?php 
    echo "<pre>"; print_r($result); echo "</pre>";
    
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
