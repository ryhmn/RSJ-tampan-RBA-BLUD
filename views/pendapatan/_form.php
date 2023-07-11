<?php

use app\models\Pendapatan;
use app\models\Rba;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pendapatan-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- 
    <?= $form->field($model, 'rba_id')->textInput(['readonly' => true]) ?> -->

    <label>Tahun Anggaran</label>
    <?php
    $cur_date = date('Y');
    $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
    echo Html::activeHiddenInput($model, 'rba_id', ['value' => $rba->rba_id]);
    echo "<input value='$rba->rba_tahun' class='form-control' disabled/>"
    ?>
    <!-- 
    <?= $form->field($model, 'parent_pendapatan_id')->textInput() ?> -->
    <label>Parent Pendapatan</label>
    <?php
    $pendapatanparent = Pendapatan::find()->all();
    echo $form->field($model, 'parent_pendapatan_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($pendapatanparent, 'parent_pendapatan_id', function ($pendapatanparent) {
            return $pendapatanparent->sumber_pendapatan;
        }),
        'options' => [
            'placeholder' => 'Pilih Parent Pendapatan'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(false);
    ?>

    <?= $form->field($model, 'sumber_pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_pendapatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>