<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition register-page">
        <?php $this->beginBody() ?>
        <div class="register-box">
            <div class="register-logo">
                <a>User Sign up</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
