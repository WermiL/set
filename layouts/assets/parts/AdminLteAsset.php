<?php

namespace app\layouts\assets\parts;

use yii\web\AssetBundle;

/**
 * AdminLTE asset bundle.
 */
class AdminLteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/adminLte/AdminLTE.css',
        'css/adminLte/skin-green.css',
    ];
    public $js = [
        'js/adminlte.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
