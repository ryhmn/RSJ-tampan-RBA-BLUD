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

    <div class="input-group d-flex">
        <?= $form->field($model, 'tanggal_pergeseran')->textInput(['placeholder' => "Cari Tanggal Pergeseran", 'class' => 'border rounded-left h-100 px-3'])->label(false) ?>
        <div class="form-group">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>