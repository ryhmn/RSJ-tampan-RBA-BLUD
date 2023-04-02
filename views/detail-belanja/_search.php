<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanjaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detail-belanja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'detail_belanja_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'belanja_id') ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'jumlah_belanja') ?>

    <?php // echo $form->field($model, 'satuan_id') ?>

    <?php // echo $form->field($model, 'harga_satuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
