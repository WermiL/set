<?php

namespace app\layouts\assets\parts;

use yii\web\AssetBundle;

/**
 * AdminLTE asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fontAwesome/css/all.css',
    ];
    public $js = [];
    public $depends = [];
}
