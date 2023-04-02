<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-pergeseran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pergeseran_id')->textInput() ?>

    <?= $form->field($model, 'detail_belanja_id')->textInput() ?>

    <?= $form->field($model, 'harga_belanja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_belanja')->textInput() ?>

    <?= $form->field($model, 'satuan_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
