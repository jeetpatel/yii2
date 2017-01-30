<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\assets\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
//AppAsset::register($this);
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
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
    <a href="<?php echo \Yii::$app->homeUrl; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo SITE_SHORT_NAME;?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo SITE_NAME; ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php if (!Yii::$app->user->isGuest) { ?>
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">                
              <img src="<?php echo \Yii::$app->homeUrl; ?>../public/images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span>                
            </a>
            <?php } ?>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo \Yii::$app->homeUrl; ?>../public/images/avatar.png" class="img-circle" alt="User Image">               
              </li>
              <li><a href="<?php echo Url::to(['user/profile']); ?>">My Profile</a></li>
              <li><a href="<?php echo Url::to(['user/logout']); ?>">Logout</a></li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
    
<?php  echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    <?php
    /*
    NavBar::begin([
        'brandLabel' => SITE_NAME,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/user/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/user/login']];
    } else {
        $menuItems[] = [
            'label' => 'Profile',
            'url' => ['/user/profile'],
        ];
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/user/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();*/
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    </section>
</div>

<footer class="main-footer">
    
    <strong>&copy; <?php echo SITE_NAME; ?> <?= date('Y') ?> <?= Yii::powered() ?>.</strong> All rights
    reserved.
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
