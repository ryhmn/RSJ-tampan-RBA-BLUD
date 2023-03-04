<?php

use app\models\Belanja;
use app\models\Item;
use app\models\Jbelanja;
use app\models\Satuan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dbelanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dbelanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['value' => Yii::$app->user->identity->user_id]) ?>

    <!-- <?= $form->field($model, 'belanja_id')->textInput() ?> -->
    <?php
        $belanja = Belanja::find()->all();
        echo $form->field($model, 'belanja_id')->dropDownList(ArrayHelper::map($belanja, 'belanja_id', function($belanja){return $belanja->jenis_belanja_id;}), 
            ['prompt' => 'Pilih Belanja']);
    ?>

    <!-- <?= $form->field($model, 'item_id')->textInput() ?> -->
    <?php
        $item = Item::find()->all();
        echo $form->field($model, 'item_id')->dropDownList(ArrayHelper::map($item, 'item_id', function($item){return $item->nama_item;}), 
            ['prompt' => 'Pilih Belanja']);
    ?>

    <?= $form->field($model, 'jumlah_belanja')->textInput() ?>

    <!-- <?= $form->field($model, 'satuan_id')->textInput() ?> -->
    <?php
        $satuan = Satuan::find()->all();
        echo $form->field($model, 'satuan_id')->dropDownList(ArrayHelper::map($satuan, 'satuan_id', function($satuan){return $satuan->nama_satuan;}), 
            ['prompt' => 'Pilih Belanja']);
    ?>

    <?= $form->field($model, 'harga_satuan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
