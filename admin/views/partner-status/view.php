<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use common\models\Common;

/* @var $this yii\web\View */
/* @var $model backend\models\PartnerStatus */

$this->title = Yii::t('app','View').' : '.$model->status_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Status'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>        
    </div>
    <div class="box-body no-padding"> 


    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'status_name',
            'status_description',
            [
              'attribute' => 'created_at',
              'value' => Common::getFormatedDate($model->created_at,'d F,Y H:i:s'),              
            ],
            [
              'attribute' => 'updated_at',
              'value' => Common::getFormatedDate($model->updated_at,'d F,Y H:i:s'),
            ],
        ],
    ]) ?>
        <div class="box-footer">
          <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-success']) ?>
        </div>
        
</div>
</div>