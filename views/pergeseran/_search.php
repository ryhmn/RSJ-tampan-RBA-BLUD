<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PergeseranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pergeseran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pergeseran_id') ?>

    <?= $form->field($model, 'rba_id') ?>

    <?= $form->field($model, 'tanggal_pergeseran') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
