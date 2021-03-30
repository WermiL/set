<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<header class="main-header">
    <a href="<?= Url::to('/', true) ?>" class="logo">
        <span class="logo-mini"><?= Html::encode(Yii::$app->name) ?></span>
        <span class="logo-lg"><?= Html::encode(Yii::$app->name) ?></span>
    </a>
    <nav class="navbar navbar-static-top p-0">
        <a href="#" class="sidebar-toggle fas fa-bars" data-toggle="push-menu" role="button">
        </a>
        <div class="navbar-custom-menu">
        </div>
    </nav>
</header>

