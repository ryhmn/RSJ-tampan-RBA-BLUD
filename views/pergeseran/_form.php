<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Rba;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pergeseran-form">

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