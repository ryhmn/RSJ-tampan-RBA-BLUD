<?php

use app\models\Jbelanja;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Jbelanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jbelanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'parent_jenis_belanja_id')->textInput() ?> -->
    <?php
        $parent_j = Jbelanja::find()->all();
        echo $form->field($model, 'parent_jenis_belanja_id')->dropDownList(ArrayHelper::map($parent_j, 'jenis_belanja_id', function($parent_j){return $parent_j->jenis_belanja;}), 
            ['prompt' => 'Pilih Jenis Belanja'])->label('Parent Jenis Belanja');
    ?>

    <?= $form->field($model, 'jenis_belanja')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
