<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/bootstrap/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        //'public/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'public/dist/css/AdminLTE.min.css',
        'public/plugins/iCheck/square/blue.css',
        'public/custom/common.css',
        //'public/dist/css/skins/_all-skins.min.css',
        //'public/plugins/datepicker/datepicker3.css',
        //'public/plugins/daterangepicker/daterangepicker.css',
        //'public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
    ];
    public $js = [
      //'public/plugins/jQuery/jquery-2.2.3.min.js',
      'public/bootstrap/js/bootstrap.min.js',
      'public/plugins/fastclick/fastclick.js',
      'public/dist/js/app.min.js',
      'public/plugins/sparkline/jquery.sparkline.min.js',
      'public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
      'public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
      'public/plugins/slimScroll/jquery.slimscroll.min.js',
      'public/plugins/chartjs/Chart.min.js',
      //'public/plugins/daterangepicker/daterangepicker.js',
      'public/plugins/datepicker/bootstrap-datepicker.js',
      'public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
      //'public/dist/js/pages/dashboard2.js',
      'public/dist/js/demo.js',
    ];
}
