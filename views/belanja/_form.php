<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="belanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rba_id')->textInput() ?>

    <?= $form->field($model, 'jenis_belanja_id')->textInput() ?>

    <?= $form->field($model, 'pagu_indikatif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
