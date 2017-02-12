<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PartnerStatus */

$this->title = Yii::t('app', 'Create Partner Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>        
    </div>
    <div class="box-body no-padding"> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>
