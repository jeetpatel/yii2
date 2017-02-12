<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Partner */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Partner']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>        
    </div>
    <div class="box-body no-padding"> 
    <?= $this->render('_form', [
        'model' => $model,'firmResult'=>$firmResult,'orgResult'=>$orgResult,
          'pStatusResult'=>$pStatusResult
    ]) ?>
    </div>
</div>
