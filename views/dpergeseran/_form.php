<?php

use app\models\Dbelanja;
use app\models\Pergeseran;
use app\models\Satuan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dpergeseran $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dpergeseran-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'pergeseran_id')->textInput() ?> -->
    <?php
        $status = "belum final";
        $perg_status = Pergeseran::find()->where(['status' => $status])->one();
        echo $form->field($model, 'pergeseran_id')->textInput(['value' => $perg_status->pergeseran_id]);
    ?>

    <!-- <?= $form->field($model, 'detail_belanja_id')->textInput() ?> -->
    <?php
        $dbelanja = Dbelanja::find()->all();
        echo $form->field($model, 'detail_belanja_id')->dropDownList(ArrayHelper::map($dbelanja, 'detail_belanja_id', function($dbelanja) {return $dbelanja->item_id;}),
            [
                'prompt' => 'Pilih Item',
                // 'onchange' => '$("#model_harga_belanja").val($("#model_detail_belanja_id option:selected")."test");'
            ]);
    ?>

    <?= $form->field($model, 'harga_belanja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_belanja')->textInput() ?>

    <!-- <?= $form->field($model, 'satuan_id')->textInput() ?> -->
    <?php
        $satuan = Satuan::find()->all();
        echo $form->field($model, 'satuan_id')->dropDownList(ArrayHelper::map($satuan, 'satuan_id', function($satuan){return $satuan->nama_satuan;}),
        ['prompt' => 'Pilih Satuan']);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
