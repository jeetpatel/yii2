<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Firm Types';
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->session->hasFlash('success')):   
endif;
$count = 1; 
?>
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Firm Type</h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
    <?php if (count($result)>0) { ?>
    <table class="table table-striped">
        <tr>
            <th style="width: 10px">#</th>
            <th>Name</th>
            <th>Description</th>           
            <th>Created</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($result as $res) { ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['description']; ?></td>
            <td>
                <?php echo Common::getFormatedDate($res['created_at']); ?>
            </td>
            <td><?php echo Common::getStatus($res['status']); ?></td>
            <td>
              <a href="/admin/firm-type/view?id=7" title="View" aria-label="View" data-pjax="0">
                  <span class="glyphicon glyphicon-eye-open"></span>
              </a> 
                <a href="<?php echo Url::to(['firm-type/update?id='.$res['id']]); ?>" title="Edit" aria-label="Edit" data-pjax="0">
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
//    
//    echo GridView::widget([
//        'dataProvider' => $dataProvider,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'name',
//            'description',
//            'status',
//            'created_at',
//            // 'updated_at',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); 
     
    ?>

