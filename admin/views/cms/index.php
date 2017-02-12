<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
</div>
<!-- /.box-header -->
<div class="box-body no-padding"> 
<?php
//foreach ($dataProvider->getModels() as $model){
//  echo "<pre>"; print_r($model); echo "</pre>";
//  echo $model->firm->firm_name;
//  
//}
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => [
          'class' => 'table table-striped',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'page_title',
            'page_body:ntext',                        
            [        
              'attribute' => 'status',
              'value' => function ($model) {
                  return $model->status == 1 ? 'Active' : 'Inactive';
              },
            ],
              [  
        'class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['style' => 'width:100px;','class'=>'action'],
        'header'=>'Action',
        'template' => '{view} {update} {delete}',
        'buttons' => [
            'delete' => function ($url, $model) {
                return false;
            },
        ], 
        'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url =Url::to(['cms/view?id='.$model->id]);
                return $url;
            }
            if ($action === 'update') {
                $url =Url::to(['cms/update?id='.$model->id]);
                return $url;
            }
        }
 
       ],
        ],
    ]); ?>

</div>
</div>
