<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rba-form px-2">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rba_tahun')->textInput(['maxlength' => 4, 'type' => 'number', 'min' => '2020'])->label("Tahun RBA") ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
