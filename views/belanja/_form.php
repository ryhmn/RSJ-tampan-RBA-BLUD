<?php

use app\models\Jbelanja;
use app\models\Rba;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="belanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'rba_id')->textInput() ?> -->
    <?php
        $rba = Rba::find()->all();
        echo $form->field($model, 'rba_id')->dropDownList(ArrayHelper::map($rba, 'rba_id', function($rba){return $rba->rba_tahun;}), 
            ['prompt' => 'Pilih Tahun RBA']);
    ?>

    <!-- <?= $form->field($model, 'jenis_belanja_id')->textInput() ?> -->
    <?php
        $jbelanja = Jbelanja::find()->all();
        echo $form->field($model, 'jenis_belanja_id')->dropDownList(ArrayHelper::map($jbelanja, 'jenis_belanja_id', function($jbelanja){return $jbelanja->jenis_belanja;}), 
            ['prompt' => 'Pilih Tahun RBA']);
    ?>

    <?= $form->field($model, 'pagu_indikatif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
