<?php

use app\models\DetailBelanja;
use app\models\Rba;
use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
?>

<div class="pergeseran-form">

    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-6">
            <label>Tahun RBA</label>
            <?php 
                $cur_date = date("Y");
                $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
                $cur_rba = $rba->rba_tahun;
                echo Html::input('text', 'rba_id', $cur_rba, $options = ['class' => 'form-control', 'maxlength' => true, 'disabled' => true]); 
                echo $form->field($model, 'rba_id')->textInput(['value' => $rba->rba_id, 'maxlength' => true, 'class' => 'd-none'])->label(false); 
                ?>
            <?php 
                $cur_date = date("Y");
                $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
                echo $form->field($model, 'rba_id')->textInput(['value' => $rba->rba_id, 'maxlength' => true, 'class' => 'd-none'])->label(false); 
            ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'tanggal_pergeseran')->widget(DatePicker::className(), [
                'value' => '2023-Jan-01',
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'removeButton' => false,
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'autoclose' => true,
                    'format' => 'yyyy/mm/dd'
                ]
            ])->label("Tanggal Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']); ?>
        </div>
    </div>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, 'maxlength' => true])->label("Keterangan<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']); ?>

    <?php
        $data = array("final" => "Final", "belum final" => "Belum Final");

        echo $form->field($model, 'status')->widget(Select2::classname(), [
            'data' => $data,
            'options' => [
                'placeholder' => 'Pilih Bidang'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label("Status Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal text-muted']);
    ?>

    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-item',
        'deleteButton' => '.remove-item',
        'model' => $modelsDetailPergeseran[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'detail_belanja_id',
            'harga_belanja',
            'jumlah_belanja',
            'satuan_id'
        ],
    ]); ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Harga Belanja</th>
                <th>Jumlah Belanja</th>
                <th>Satuan</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
            <?php foreach ($modelsDetailPergeseran as $i => $modelDetailPergeseran): ?>
                <tr class="item">
                    <td class="vcenter">
                        <?php
                            // necessary for update action.
                            if (! $modelDetailPergeseran->isNewRecord) {
                                echo Html::activeHiddenInput($modelDetailPergeseran, "[{$i}]detail_pergeseran_id");
                            }
                        ?>
                        <?php
                            $item = DetailBelanja::find()->all();
                            echo $form->field($modelDetailPergeseran, "[{$i}]detail_belanja_id")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($item, 'detail_belanja_id', function($item){return $item->item->nama_item;}),
                                'options' => [
                                    'placeholder' => 'Pilih Item'
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ])->label(false);
                        ?>
                    </td>
                    <td>
                        <?= $form->field($modelDetailPergeseran, "[{$i}]harga_belanja")->label(false)->textInput(['maxlength' => true, 'id' => 'harga-belanja']); ?>
                    </td>
                    <td>
                        <?= $form->field($modelDetailPergeseran, "[{$i}]jumlah_belanja")->label(false)->textInput(['maxlength' => true]); ?>
                    </td>
                    <td>
                        <?php
                            $satuan = DetailBelanja::find()->all();
                            echo $form->field($modelDetailPergeseran, "[{$i}]satuan_id")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($satuan, 'satuan_id', function($satuan){return $satuan->satuan->nama_satuan;}),
                                'options' => [
                                    'placeholder' => 'Pilih Satuan'
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]
                            ])->label(false);
                        ?>
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
