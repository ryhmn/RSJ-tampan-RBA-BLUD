<?php

use app\models\Bidang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\User $model */
?>

<div class="user-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'crud-user-form']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username'])->label(false) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password'])->label(false) ?>

    <?php
        $bidang = Bidang::find()->all();
        echo $form->field($model, 'bidang_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map($bidang, 'bidang_id', function($bidang){return $bidang->nama_bidang;}),
            'options' => [
                'placeholder' => 'Pilih Bidang'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label(false);
    ?>
    
    <div class="form-group mt-5 mb-1">
        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan', ['class' => 'btn btn-success px-4']) ?> 
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
