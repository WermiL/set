<?php
/* @var $content string */

use app\widgets\Alert;

?>
<main class="main">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
