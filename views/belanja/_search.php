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

    <!-- <?= $form->field($model, 'belanja_id') ?>

    <?= $form->field($model, 'rba_id') ?>

    <?= $form->field($model, 'jenis_belanja_id') ?>

    <?= $form->field($model, 'pagu_indikatif') ?> -->

    <div class="input-group d-flex mt-3">
        <?= $form->field($model, 'jenis_belanja_id')->textInput(['placeholder' => "Cari Jenis Belanja", 'class' => 'border rounded-left h-100 px-3 ml-3'])->label(false); ?>
        <div class="form-group input-group-append align-self-center">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-light border']); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
