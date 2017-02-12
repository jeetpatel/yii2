<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model backend\models\Partner */

$this->title = Yii::t('app', 'View Partner Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo Html::encode($this->title); ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">



        <?=
        DetailView::widget([
          'model' => $model,
          'attributes' => [
            array(
              'attribute' => Yii::t('app', 'Firm'),
              'value' => $model->firm->firm_name
            ),
            array(
              'attribute' => Yii::t('app', 'Organization'),
              'value' => $model->organization->name
            ),
            array(
              'attribute' => Yii::t('app', 'Partner Status'),
              'value' => $model->partnerStatus->status_name
            ),
            [
              'attribute' => 'contract_start',
              'value' => Common::getFormatedDate(strtotime($model->contract_start), 'd F,Y'),
            ],
            [
              'attribute' => 'contract_end',
              'value' => Common::getFormatedDate(strtotime($model->contract_end), 'd F,Y'),
            ],
            [
              'attribute' => 'updated_at',
              'value' => Common::getFormatedDate($model->updated_at, 'd F,Y H:i:s'),
            ], 
            [
              'attribute' => 'updated_at',
              'value' => Common::getFormatedDate($model->updated_at, 'd F,Y H:i:s'),
            ],
          ],
        ])
        ?>
        <div class="box-footer">
          <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
