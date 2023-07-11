<?php

use app\models\Belanja;
use app\models\Item;
use app\models\Satuan;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanja $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-belanja-form">

    <?php $form = ActiveForm::begin(); ?>

    <label>User ID</label>
    <?php
    $user_Id = Yii::$app->user->identity->user_id;
    $UserName = Yii::$app->user->identity->username;
    $user = User::find()->where(['user_id' => $user_Id])->one();
    echo Html::activeHiddenInput($model, 'user_id', ['value' => $user_Id]);
    echo "<input value='$UserName' class='mb-3 form-control' disabled/>"
    ?>

    <!-- <?= $form->field($model, 'belanja_id')->textInput() ?> -->
    <label>Jenis Belanja</label>
    <?php
    $belanjaslc = Belanja::find()->all();
    echo $form->field($model, 'belanja_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($belanjaslc, 'belanja_id', function ($belanjaslc) {
            return $belanjaslc->jenisBelanja->jenis_belanja;
        }),
        'options' => [
            'placeholder' => 'Pilih Jenis Belanja'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(false);
    ?>

    <label>Nama Item</label>
    <?php
    $nmitm = Item::find()->all();
    echo $form->field($model, 'item_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($nmitm, 'item_id', function ($nmitm) {
            return $nmitm->nama_item;
        }),
        'options' => [
            'placeholder' => 'Pilih Nama Item'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(false);
    ?>

    <?= $form->field($model, 'jumlah_belanja')->textInput() ?>

    <label>Satuan</label>
    <?php
    $stn = Satuan::find()->all();
    echo $form->field($model, 'satuan_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map($stn, 'satuan_id', function ($stn) {
            return $stn->nama_satuan;
        }),
        'options' => [
            'placeholder' => 'Pilih Nama Satuan'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(false);
    ?>

    <?= $form->field($model, 'harga_satuan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>