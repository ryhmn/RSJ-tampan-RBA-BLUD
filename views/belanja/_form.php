<?php

use app\models\JenisBelanja;
use app\models\Rba;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use function PHPSTORM_META\type;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="belanja-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'dynamic-form']) ?>

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

    <?php
        $jenis_bel = JenisBelanja::find()->all();
        echo $form->field($model, "jenis_belanja_id")->widget(Select2::classname(), [
            'data' => ArrayHelper::map($jenis_bel, 'jenis_belanja_id', function($jenis_bel){return $jenis_bel->jenis_belanja;}),
            'options' => [
                'placeholder' => 'Pilih Jenis Belanja'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label("Jenis Belanja<span class='text-danger'>*</span>", ['class' => 'font-weight-normal']);
    ?>
    
    <?= $form->field($model, "pagu_indikatif", [
        'inputTemplate' => '
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text font-weight-bold">Rp.</div>
                </div>
                {input}
            </div>'
    ])->textInput(['maxlength' => true, 'type' => 'number'])->label("Pagu Indikatif<span class='text-danger'>*</span>", ['class' => 'font-weight-normal']); ?>

    <div class="form-group mt-5 mb-1">
        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan', ['class' => 'btn btn-success px-4']) ?> 
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
