<?php
/* @var $content string */

use frontend\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>


