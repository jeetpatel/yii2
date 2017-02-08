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
                    <td>Status Name : </td>
                      <td><?php echo $model->name; ?></td>
                </tr>
                <tr>
                    <td>Firm Name : </td>
                      <td><?php echo $model->firm_name; ?></td>
                </tr>
                <tr>
                    <td>Organization Status Type : </td>
                      <td><?php echo $model->status_name; ?></td>
                </tr>
                 <tr>
                    <td>Contract Start Date : </td>
                    <td><?php echo Common::getFormatedDate(strtotime($model->contract_start)); ?></td>
                </tr>
                 <tr>
                    <td>Contract End Date : </td>
                      <td><?php echo Common::getFormatedDate(strtotime($model->contract_end)); ?></td>
                </tr>
                <tr>
                    <td>Created At : </td>
                    <td><?php echo Common::getFormatedDate($model->created_at,'d F,Y H:i:s A'); ?></td>
                </tr>
                <tr>
                    <td>Updated At : </td>
                    <td><?php echo Common::getFormatedDate($model->updated_at,'d F,Y H:i:s A'); ?></td>
                </tr>
                <tr>
                        <td>
                            <a href="<?php echo Url::to(['organization/index']); ?>">Back</a>
                    </td>
                    <td>
                    </td>
                </tr>
        </table>
      </div>
</div>
