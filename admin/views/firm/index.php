<?php
use common\models\Common;
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firms';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->session->hasFlash('success')):   
endif;
$count = 1;
?>
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Firm List</h3>
    <?= Html::a(Yii::t('app', 'Create Firm'), ['create'], ['class' => 'btn btn-success']) ?>        
</div>

    
<div class="box-body no-padding">
    <?php if (count($result)>0) { ?>
    <table class="table table-striped">
        <tr>
            <th style="width: 10px">#</th>
            <th>Firm Name</th>
            <th>Firm Type</th>           
            <th>Created</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $res) { ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $res['firm_name']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td>
                <?php echo Common::getFormatedDate($res['created_at']); ?>
            </td>
            <td><?php echo Common::getStatus($res['status']); ?></td>
            <td>
              <a href="<?php echo Url::to(['firm/view?id='.$res['id']]); ?>" title="View" aria-label="View" data-pjax="0">
                  <span class="glyphicon glyphicon-eye-open"></span>
              </a>
                <a href="<?php echo Url::to(['firm/update?id='.$res['id']]); ?>" title="Edit" aria-label="Edit" data-pjax="0">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
<!--                <a href="/admin/firm-type/delete?id=7" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post" data-pjax="0">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>-->
            </td>
        </tr>
    <?php $count++; } } else { ?>
        <p>No result found.</p>
    <?php } ?>
    </table>
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
        <li><a>&laquo;</a></li>
        <li><a>1</a></li>
        <li><a>&raquo;</a></li>
    </ul>
</div>
</div>



    <?php 
    /*
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firm_name',
            'firm_type',
            'is_registered',
            'vat_number',
             'cst_number',
             'gst_number',
             'pan_number',
             'tan_number',
             'service_tax',
             'primary_contact',
             'primary_email:email',
             'address_1',
             'address_2',
             'district',
             'state',
             'pin_code',
             'longitude',
             'latitude',
             'status',
             'created_at',
             'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
     * 
     *
     */
    ?>