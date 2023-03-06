<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\PergeseranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pergeseran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="input-group d-flex">
        <?=
        $form->field($model, 'tanggal_pergeseran')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Cari Tanggal Pergeseran'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd'
            ]
        ]);
        ?>
        <div class="form-group">
            <?= Html::submitButton('<i class="fas fa-search"></i>', ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>