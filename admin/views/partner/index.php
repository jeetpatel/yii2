<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <?= Html::a(Yii::t('app', 'Create Partner'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <!-- /.box-header -->
    <div class="box-body no-padding"> 

        <?=
        GridView::widget([
          'dataProvider' => $dataProvider,
          'summary' => '',
          'tableOptions' => [
            'class' => 'table table-striped',
          ],
          'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute' => Yii::t('app', 'Firm'),
              'value' => function ($model) {
                return $model->firm->firm_name;
              },
            ],
            [
              'attribute' => Yii::t('app', 'Organization'),
              'value' => function ($model) {
                return $model->organization->name;
              },
            ],
            [
              'attribute' => Yii::t('app', 'Partner Status'),
              'value' => function ($model) {
                return $model->partnerStatus->status_name;
              },
            ],
            [
              'attribute' => 'contract_start',
              'value' => function ($model) {
                return Common::getFormatedDate(strtotime($model->contract_start), 'd F,Y');
              },
            ],
            [
              'attribute' => 'contract_end',
              'value' => function ($model) {
                return Common::getFormatedDate(strtotime($model->contract_end), 'd F,Y');
              },
            ],
            [
              'attribute' => 'updated_at',
              'value' => function ($model) {
                return Common::getFormatedDate($model->updated_at, 'd F,Y H:i:s');
              },
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'contentOptions' => ['style' => 'width:100px;', 'class' => 'action'],
              'header' => 'Action',
              'template' => '{view} {update} {delete}',
              'buttons' => [
                'delete' => function ($url, $model) {
                  return false;
                },
              ],
              'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
              $url = Url::to(['partner/view?id=' . $model->id]);
              return $url;
            }
            if ($action === 'update') {
              $url = Url::to(['partner/update?id=' . $model->id]);
              return $url;
            }
          }
            ],
          ],
        ]);
        ?>

    </div>
</div>
