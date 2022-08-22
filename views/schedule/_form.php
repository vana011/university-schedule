<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')->widget(\kartik\select2\Select2::classname(), [
        'data' => ['Понедельник' => 'Понедельник', 'Вторник' => 'Вторник', 'Среда' => 'Среда', 'Четвернг' => 'Четверг', 'Пятница' => 'Пятница'],
        'options' => ['placeholder' => 'Выбрать день ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'number')->widget(\kartik\select2\Select2::classname(), [
        'data' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'],
        'options' => ['placeholder' => 'Выбрать номер пары ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'groupe_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Groupe::find()->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Выбрать группу ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'speciality_subject_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\SpecialitySubject::find()->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Выбрать курс ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
