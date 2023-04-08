<?php

use app\models\DetailBelanja;
use app\models\Pergeseran;
use app\models\Satuan;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseran $model */
?>

<div class="detail-pergeseran-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(); ?>

    <?php
        $pergeseran = Pergeseran::find()->all();
        echo $form->field($model, 'pergeseran_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($pergeseran, 'pergeseran_id', function($pergeseran){return $pergeseran->tanggal_pergeseran;}),
            'options' => [
                'placeholder' => 'yyyy-mm-dd',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Tanggal Pergeseran');
    ?>

    <?php
        $detail_belanja = DetailBelanja::find()->all();
        echo $form->field($model, 'detail_belanja_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($detail_belanja, 'detail_belanja_id', function($detail_belanja){return $detail_belanja->item->nama_item;}),
            'options' => [
                'placeholder' => 'Nama Item',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Item Pergeseran');
    ?>

    <?= $form->field($model, 'harga_belanja')->textInput(['maxlength' => true, 'placeholder' => 'Contoh: 100000']) ?>

    <?= $form->field($model, 'jumlah_belanja')->textInput() ?>

    <?php
        $satuan = Satuan::find()->all();
        echo $form->field($model, 'satuan_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($satuan, 'satuan_id', function($satuan){return $satuan->nama_satuan;}),
            'options' => [
                'placeholder' => 'Nama Satuan',
            ],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ])->label('Satuan Item');
    ?>

    <div class="form-group mt-5 mb-1">
        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan', ['class' => 'btn btn-success px-4']) ?> 
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
