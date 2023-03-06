<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pergeseran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rba_id')->textInput() ?>

    <?=
    $form->field($model, 'tanggal_pergeseran')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Cari Tanggal Pergeseran'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd'
        ]
    ]);
    ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['disetujui' => 'Disetujui', 'tidak disetujui' => 'Tidak disetujui',], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>