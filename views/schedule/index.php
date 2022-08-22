<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание';
if (!Yii::$app->user->isGuest) {
    $user = \app\models\User::find()->where(['id' => Yii::$app->user->id])->one();
}
?>
<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'day',
            'number',
            [
                'attribute' => 'groupe_id',
                'value' => function (\app\models\Schedule $model) {
                    return $model->groupe->name;
                }
            ],
            [
                'attribute' => 'speciality_subject_id',
                'value' => function (\app\models\Schedule $model) {
                    return $model->specialitySubject->subject->name;
                }
            ],
            [
                'class' => ActionColumn::className(),

                'template' => !Yii::$app->user->isGuest && $user->isAdmin() ?' {delete} {update}' : '',
                'urlCreator' => function ($action, \app\models\Schedule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
