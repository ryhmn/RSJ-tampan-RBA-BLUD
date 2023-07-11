<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jenis-belanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_jenis_belanja_id')->textInput() ?>

    <?= $form->field($model, 'jenis_belanja')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>