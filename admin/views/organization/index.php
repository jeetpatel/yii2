<?php
use yii\helpers\Html;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title =  Yii::t('app', 'Organization');
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->session->hasFlash('success')):   
endif;
$count = 1; 
?>
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title"><?php echo $this->title; ?></h3>
    <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-success']) ?>        
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
    <?php if (count($result)>0) { ?>
    <table class="table table-striped">
        <tr>
            <th style="width: 10px">#</th>
            <th>Organization Name</th>
            <th>Firm Name</th>           
            <th>Organization Status Type</th>
            <th>Contract Start</th>           
            <th>Contract End</th>           
            <th>Updated</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $res) { ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['firm_name']; ?></td>
            <td><?php echo $res['status_name']; ?></td>
            <td><?php echo $res['contract_start']; ?></td>
            <td><?php echo $res['contract_end']; ?></td>
            <td>
                <?php echo Common::getFormatedDate($res['updated_at'],'d F,Y H:i:s'); ?>
            </td>            
            <td class="action">
              <a href="<?php echo Url::to(['organization/view?id='.$res['id']]); ?>" title="View" aria-label="View" data-pjax="0">
                  <span class="glyphicon glyphicon-eye-open"></span>
              </a> 
                <a href="<?php echo Url::to(['organization/update?id='.$res['id']]); ?>" title="Edit" aria-label="Edit" data-pjax="0">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a> 
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

