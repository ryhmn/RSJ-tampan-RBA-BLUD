<?php

use app\models\Rba;
use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
?>

<div class="pergeseran-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-6">
            <label>Tahun RBA</label>
            <?php 
                $cur_date = date("Y");
                $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
                $cur_rba = $rba->rba_tahun;
                echo Html::input('text', 'rba_id', $cur_rba, $options = ['class' => 'form-control', 'maxlength' => true, 'disabled' => true]); 
                echo $form->field($model, 'rba_id')->textInput(['value' => $rba->rba_id, 'maxlength' => true, 'class' => 'd-none'])->label(false); 
                ?>
            <?php 
                $cur_date = date("Y");
                $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
                echo $form->field($model, 'rba_id')->textInput(['value' => $rba->rba_id, 'maxlength' => true, 'class' => 'd-none'])->label(false); 
            ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'tanggal_pergeseran')->widget(DatePicker::className(), [
                'value' => '2023-Jan-01',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'removeButton' => false,
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'autoclose' => true,
                    'format' => 'yyyy/mm/dd'
                ]
            ])->label("Tanggal Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']); ?>
        </div>
    </div>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, 'maxlength' => true])->label("Keterangan<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']); ?>

    <?php
        $data = array("final" => "Final", "belum final" => "Belum Final");

        echo $form->field($model, 'status')->widget(Select2::classname(), [
            'data' => $data,
            'options' => [
                'placeholder' => 'Pilih Bidang'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label("Status Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']);
    ?>

    <div class="form-group mt-5 mb-1">
        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan', ['class' => 'btn btn-success px-4']) ?> 
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
