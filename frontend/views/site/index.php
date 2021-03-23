<?php

/* @var $this yii\web\View */

$this->title = 'Yii App';
?>
<div class="index">
<!--    <div class="jumbotron">-->
<!--        <h1>--><?//= Yii::t('test', 'Test 1') ?><!--</h1>-->
<!--    </div>-->
<!--    <div class="jumbotron">-->
<!--        --><?//= Yii::t('test', 'Test 2') ?>
<!--    </div>-->

    <?php echo '<pre>';

    function buildFkClause($delete = '', $update = '')
    {
        return implode(' ', ['', $delete, $update]);
    }


    buildFkClause('ON DELETE SET NULL', 'ON UPDATE CASCADE')


    ?>
    <?php echo print_r('|'.buildFkClause('ON DELETE SET NULL', 'ON UPDATE CASCADE')."|", true); ?>
    <?php echo '</pre>'; ?>
    <?php die; ?>
</div>
