<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\layouts\assets\AdminPanelAsset;
use yii\helpers\Html;

AdminPanelAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Html::encode(Yii::$app->language) ?>">
<head>
    <meta charset="<?= Html::encode(Yii::$app->charset) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="sidebar-mini skin-green">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render('_header') ?>

    <?= $this->render('_leftSidebar') ?>

    <?= $this->render('_main', [
        'content' => $content
    ]) ?>

    <?= $this->render('_footer') ?>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
