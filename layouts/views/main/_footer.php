<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<footer class="footer p-0 mt-auto bg-light border-top">
    <div class="container">
        <div class="d-flex align-items-center py-1 my-2">
            <p class="text-muted m-0"><?= Html::encode(Yii::$app->name) ?> © 2021 by Wermil</p>
            <div class="ml-auto">
                <?= Html::a('RU', Url::to('/i18n/language'), ['class' => 'px-2 mx-1', 'data-method' => 'POST',
                    'data-params' => [
                        'language' => 'ru_RU',
                        'url' => Url::current()
                    ]]) ?>
                <?= Html::a('EN', Url::to('/i18n/language'), ['class' => 'px-2 mx-1', 'data-method' => 'POST',
                    'data-params' => [
                        'language' => 'en_US',
                        'url' => Url::current()
                    ],]) ?>
            </div>
        </div>
    </div>
</footer>