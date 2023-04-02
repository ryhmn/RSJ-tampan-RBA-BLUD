<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BelanjaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="belanja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'belanja_id') ?>

    <?= $form->field($model, 'rba_id') ?>

    <?= $form->field($model, 'jenis_belanja_id') ?>

    <?= $form->field($model, 'pagu_indikatif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
