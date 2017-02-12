<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partner Status');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <?= Html::a(Yii::t('app', 'Create Partner Status'), ['create'], ['class' => 'btn btn-success']) ?>
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
           
            'status_name',
            'status_description',
            [
              'attribute' => 'created_at',
              'value' => function ($model) {
                return Common::getFormatedDate($model->created_at,'d F,Y H:i:s');
              },
            ],
            [
              'attribute' => 'updated_at',
              'value' => function ($model) {
                return Common::getFormatedDate($model->updated_at,'d F,Y H:i:s');
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
              $url = Url::to(['partner-status/view?id=' . $model->id]);
              return $url;
            }
            if ($action === 'update') {
              $url = Url::to(['partner-status/update?id=' . $model->id]);
              return $url;
            }
          }
            ],
          ],
        ]);
        ?>
    </div>
</div>
