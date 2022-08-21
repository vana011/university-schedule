<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
?>
<div class="user-index">

    <?php Pjax::begin(); ?>
    <?php
    $gridColumns = [

        'id',
        'email:email',
        'password:ntext',
        'authKey:ntext',
        'accessToken:ntext',
        'phone',
        [
            'attribute' => 'role_id',
            'value' => function (\app\models\User $model) {
                return $model->role->name;
            }
        ],
        [
            'class' => \yii\grid\ActionColumn::className(),
            'template' => ' {delete} {update}',
            'urlCreator' => function ($action, \app\models\User $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ];
    ?>

    <?=
    GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'headerContainer' => ['style' => 'top:50px', 'class' => 'kv-table-header'],

        'responsive' => true,
        'bordered' => true,
        'hover' => true,
        'panel' => [
            'heading' => $this->title,
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        'exportConfig' => [
            'html' => [],
            'csv' => [],
            'txt' => [],
            'xls' => [],
            'json' => [],
        ],
        // set your toolbar
        'toolbar' => [
            [
                'content' =>
                    Html::a('<i class="fas fa-plus"></i>', ['/site/register'], [
                        'class' => 'btn btn-success',
                        'title' => 'Добавить пользователя',
                        'data-pjax' => 0,
                    ]) . ' ' .
                    Html::a('<i class="fas fa-redo"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title' => 'Reset Grid',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2 me-2']
            ],
            '{export}',
            '{toggleData}',
        ],
        'toggleDataContainer' => ['class' => 'btn-group mr-2 me-2'],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
    ]);

    ?>

    <?php Pjax::end(); ?>

</div>
