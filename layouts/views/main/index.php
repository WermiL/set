<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\layouts\assets\MainAsset;
use yii\helpers\Html;

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column">
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>

<?= $this->render('_main', [
    'content' => $content
]) ?>

<?= $this->render('_footer') ?>

<div id="particles-js"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
