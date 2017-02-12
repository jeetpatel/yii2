<?php

use yii\helpers\Html;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\OrganizationStatus */
/* @var $model backend\models\FirmType */

$this->title = $model->status_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Status'), 'url' => ['index']];
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
                      <td><?php echo $model->status_name; ?></td>
                    <th>Description : </th>
                      <td><?php echo $model->status_description; ?></td>
                </tr>
                <tr>
                    <th>Created At : </th>
                    <td><?php echo Common::getFormatedDate($model->created_at,'d F,Y H:i:s A'); ?></td>
                    <th>Updated At : </th>
                    <td><?php echo Common::getFormatedDate($model->updated_at,'d F,Y H:i:s A'); ?></td>
                </tr>
                <tr>
                        <th colspan="6">
                            <a href="<?php echo Url::to(['organization-status/index']); ?>">Back</a>
                    </th>
                </tr>
        </table>
      </div>
</div>