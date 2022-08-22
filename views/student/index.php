<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Студенты';
?>
<div class="student-index">

    <?php Pjax::begin(); ?>
    <?php
    $gridColumns = [

        'id',
        'name',
        'ball',
        [
            'attribute' => 'speciality_id',
            'value' => function (\app\models\Student $model) {
                return $model->speciality->name ?? null;
            }
        ],
        [
            'attribute' => 'groupe_id',
            'value' => function (\app\models\Student $model) {
                return $model->groupe->name ?? null;
            }
        ],
        [
            'class' => \yii\grid\ActionColumn::className(),
            'template' => ' {delete} {update}',
            'urlCreator' => function ($action, \app\models\Student $model, $key, $index, $column) {
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
                    Html::a('<i class="fas fa-plus"></i>', ['create'], [
                        'class' => 'btn btn-success',
                        'title' => 'Добавить студента',
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
