<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendapatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rba_id')->textInput() ?>

    <?= $form->field($model, 'parent_pendapatan_id')->textInput() ?>

    <?= $form->field($model, 'sumber_pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_pendapatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
