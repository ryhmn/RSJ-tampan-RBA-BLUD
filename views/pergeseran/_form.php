<?php

use app\models\Rba;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
/** @var yii\widgets\ActiveForm $form */
/** @var yii\jui\DatePickery $datePicker */
?>

<div class="pergeseran-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?php echo $form->field($model, 'rba_id')->textInput() ?> -->
    <?php
        $curr_date = date("Y");
        $rba_id = Rba::find()->where(['rba_tahun' => $curr_date])->one();
        echo $form->field($model, 'rba_id')->textInput(['value'=>$rba_id->rba_id, 'class'=>'d-none']);
    ?>
    <p><?= $curr_date ?></p>

    <?= $form->field($model, 'tanggal_pergeseran')->widget(DatePicker::className(), [
        'value' => '2023/01/01',
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd'
        ]
    ]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['final' => 'Final', 'belum final' => 'Belum Final'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>