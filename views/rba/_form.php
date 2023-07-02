<?php

use app\models\JenisBelanja;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rba-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?php
        $curr_y = date("Y");
        echo $form->field($model, 'rba_tahun')->textInput(['value' => $curr_y, 'maxlength' => true])->label("Tahun Anggaran");
    ?>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsBelanja[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'jenis_belanja_id',
            'pagu_indikatif'
        ],
    ]); ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 60%">Jenis Belanja</th>
                <th>Pagu Indikatif</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
            <?php foreach ($modelsBelanja as $i => $modelBelanja): ?>
                <tr class="item">
                    <td class="vcenter">
                        <?php
                            // necessary for update action.
                            if (! $modelBelanja->isNewRecord) {
                                echo Html::activeHiddenInput($modelBelanja, "[{$i}]rba_id");
                            }
                        ?>
                        <?php
                            $jenis_b = JenisBelanja::find()
                                        ->andWhere(['between', 'parent_jenis_belanja_id', 4, 5])
                                        ->all();
                            echo $form->field($modelBelanja, "[{$i}]jenis_belanja_id")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($jenis_b, 'jenis_belanja_id', function($jenis_b){return $jenis_b->jenis_belanja;}),
                                'options' => [
                                    'placeholder' => 'Pilih Jenis Belanja',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ])->label(false);
                        ?>
                        <!-- <?= $form->field($modelBelanja, "[{$i}]jenis_belanja_id")->textInput(['maxlength' => true]) ?> -->
                    </td>
                    <td>
                        <?= $form->field($modelBelanja, "[{$i}]pagu_indikatif", [
                             'inputTemplate' => '
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text font-weight-bold">Rp.</div>
                                    </div>
                                    {input}
                                </div>'
                        ])->label(false)->textInput(['maxlength' => true]) ?>
                    </td>
                    <td class="text-center vcenter" style="width: 90px;">
                        <button type="button" class="remove-item btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php DynamicFormWidget::end(); ?>

    <div class="form-group mt-5 mb-1">
        <?= Html::submitButton('<i class="fas fa-save mr-1"></i> Simpan', ['class' => 'btn btn-success px-4']) ?> 
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
