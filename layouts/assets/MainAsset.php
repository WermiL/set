<?php

namespace app\layouts\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/temp.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'app\layouts\assets\parts\AdminLteAsset',
        'app\layouts\assets\parts\ParticlesAsset',
        'app\layouts\assets\parts\FontAwesomeAsset'
    ];
}
