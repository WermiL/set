<?php

namespace app\layouts\assets\parts;

use yii\web\AssetBundle;

/**
 * Particles asset bundle.
 */
class ParticlesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'js/particles.js',
    ];
    public $depends = [];
}
