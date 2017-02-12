<?php

use yii\helpers\Html;
use common\models\Common;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\FirmType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Firm Types', 'url' => ['index']];
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
                <th>Firm Type : </th>
                <td><?php echo $model->name; ?></td>
                <th>Status: </th>
                <td><?php echo Common::getStatus($model->status); ?></td>                
            </tr>
            <tr>
                <th>Created At : </th>
                <td><?php echo Common::getFormatedDate($model->created_at, 'd F,Y H:i:s A'); ?></td>
                <th>Updated At : </th>
                <td><?php echo Common::getFormatedDate($model->updated_at, 'd F,Y H:i:s A'); ?></td>
            </tr>
            <tr>
                <th>Description : </th>
                <td colspan="3"><?php echo $model->description; ?></td>
            </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <td>
                    <a href="<?php echo Url::to(['firm-type/index']); ?>">Back</a>
                </td>               
            </tr>
        </table>
    </div>
</div>

