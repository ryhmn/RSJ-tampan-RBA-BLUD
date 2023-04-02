<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-pergeseran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'detail_pergeseran_id') ?>

    <?= $form->field($model, 'pergeseran_id') ?>

    <?= $form->field($model, 'detail_belanja_id') ?>

    <?= $form->field($model, 'harga_belanja') ?>

    <?= $form->field($model, 'jumlah_belanja') ?>

    <?php // echo $form->field($model, 'satuan_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
