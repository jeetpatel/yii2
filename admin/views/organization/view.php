<?php

use yii\helpers\Html;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Organization */
/* @var $model backend\models\FirmType */
//echo "<pre>"; print_r($model); echo "</pre>"; die;
$model = json_encode($model);
$model = json_decode($model);
//echo "<pre>"; print_r($model); echo "</pre>"; die;
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title"><?php echo Html::encode($this->title); ?></h3>
</div>
<!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tr>
            <th>Status Name : </th>
            <td><?php echo $model->name; ?></td>
            <th>Firm Name : </th>
            <td><?php echo $model->firm_name; ?></td>
          </tr>
          <tr>
            <th>Organization Status Type : </th>
            <td><?php echo $model->status_name; ?></td>
            <th>Contract Start Date : </th>
            <td><?php echo Common::getFormatedDate(strtotime($model->contract_start)); ?></td>
          </tr>
          <tr>
            <th>Contract End Date : </th>
            <td><?php echo Common::getFormatedDate(strtotime($model->contract_end)); ?></td>
            <th>Created At : </th>
            <td><?php echo Common::getFormatedDate($model->created_at, 'd F,Y H:i:s A'); ?></td>
          </tr>
          <tr>
            <th>Updated At : </th>
            <td colspan="3"><?php echo Common::getFormatedDate($model->updated_at, 'd F,Y H:i:s A'); ?></td>
          </tr>
        </table>
        <table class="table table-striped">
          <tr>
            <th>
              <a href="<?php echo Url::to(['organization/index']); ?>">Back</a>
            </th>
          </tr>
        </table>
      </div>
</div>
