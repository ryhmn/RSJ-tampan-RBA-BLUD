<?php

use app\models\Rba;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PergeseranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pergeseran-filter">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group d-flex mt-3">
        <?php
            $rba = Rba::find()->all();
            $curr_y = date("Y");

            echo $form->field($model, 'rba_id')->dropDownList(ArrayHelper::map($rba, 'rba_id', function($rba){return $rba->rba_tahun;}), 
                ['prompt' => 'Pilih Tahun RBA', 'class' => 'border rounded h-100 px-2 mr-2'])->label(false);
        ?>
        <div class="form-group input-group-append align-self-center">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-light border rounded']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
