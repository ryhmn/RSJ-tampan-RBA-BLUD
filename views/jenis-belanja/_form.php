<?php

use app\models\JenisBelanja;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jenis-belanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'parent_jenis_belanja_id')->textInput() ?> -->
    <?php
    $jenisparent = JenisBelanja::find()->all();
    echo $form->field($model, 'parent_jenis_belanja_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($jenisparent, 'parent_jenis_belanja_id', function ($jenisparent) {
            return $jenisparent->jenis_belanja;
        }),
        'options' => [
            'placeholder' => 'Pilih Jenis Parent Belanja'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(false);
    ?>

    <?= $form->field($model, 'jenis_belanja')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>