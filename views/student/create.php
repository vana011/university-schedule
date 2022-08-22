<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Добавление студента';
?>
<div class="student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
