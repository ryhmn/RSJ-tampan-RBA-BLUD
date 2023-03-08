<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Rba;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendapatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $rba = Rba::find()->all();
    echo $form->field($model, 'rba_id')->dropDownList(
        ArrayHelper::map($rba, 'rba_id', function ($rba) {
            return $rba->rba_tahun;
        }),
        ['prompt' => 'Pilih Tahun RBA']
    );
    ?>

    <?= $form->field($model, 'parent_pendapatan_id')->textInput() ?>

    <?= $form->field($model, 'sumber_pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_pendapatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>