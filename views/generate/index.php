<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenerateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Формирование групп';

?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <button id="generate-groupe" class="btn btn-success">Формировать группы</button>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#generate-groupe').click(function () {
            $.post("/generate/generate-groupe")
                .done(function (data) {
                    console.log("Data Loaded: " +JSON.stringify(data));
                });
        });
    });
</script>