<?php

use frontend\widgets\Breadcrumbs;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user\models\search\UserAdministrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('user-administration', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content-header px-0 pb-1">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []
    ]) ?>
</section>
<section class="content bg-light border rounded">
    <div class="user-index">
        <?php if (Yii::$app->user->can('user/create')) : ?>
            <p>
                <?= Html::a(Yii::t('user-administration', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif; ?>
        <div class="table-responsive">
            <?= GridView::widget([
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-hover'
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'email:email',
                    'nickname',
                    'first_name',
                    'last_name',
                    'status',
                    [
                        'class' => ActionColumn::class,
                        'visibleButtons' => [
                            'view' => Yii::$app->user->can('user/view'),
                            'update' => Yii::$app->user->can('user/update'),
                            'delete' => Yii::$app->user->can('user/delete'),
                        ]
                    ],
                ],
            ]) ?>
        </div>
    </div>
</section>