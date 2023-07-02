<?php
use app\models\DetailBelanja;
use app\models\Item;
use app\models\Rba;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */
?>

<div class="pergeseran-form">
    
    <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <div class="row">
        <div class="col-6">
            <!-- Tahun Anggaran Field -->
            <label>Tahun Anggaran</label>
            <?php
                $cur_date = date('Y');
                $rba = Rba::find()->where(['rba_tahun' => $cur_date])->one();
                echo Html::activeHiddenInput($model, 'rba_id', ['value' => $rba->rba_id]);
                echo "<input value='$rba->rba_tahun' class='form-control' disabled/>"                
            ?>
        </div>
        <div class="col-6">
            <!-- Tanggal Pergeseran Field -->
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
            ])->label("Tanggal Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal']); ?>
        </div>
    </div>

    <!-- Keterangan Field -->
    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, 'maxlength' => true])->label("Keterangan<span class='text-danger'>*</span>", ['class' => 'font-weight-normal']); ?>

    <!-- Status Final Field -->
    <?php
        $data = array("final" => "Final", "belum final" => "Belum Final");

        echo $form->field($model, 'status')->widget(Select2::classname(), [
            'data' => $data,
            'options' => [
                'placeholder' => 'Pilih Status'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ]
        ])->label("Status Pergeseran<span class='text-danger'>*</span>", ['class' => 'font-weight-normal']);
    ?>

    <!-- Dynamic Form -->
    <!-- Using detail_pergeseran table which related to pergeseran -->
    <!-- The configuration is in detail_pergeseran controllers -->
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
            'harga_satuan',
            'jumlah_belanja',
            'satuan_id',
            'item_id'
        ],
    ]); ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Detail Belanja</th>
                <th>Nama Item</th>
                <th style="width: 20%">Harga Satuan</th>
                <th style="width: 17%">Jumlah Belanja</th>
                <th style="width: 17%">Satuan</th>
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
                            // Hidden input for detail_pergeseran_id
                            if (! $modelDetailPergeseran->isNewRecord) {
                                echo Html::activeHiddenInput($modelDetailPergeseran, "[{$i}]detail_pergeseran_id");
                            }
                        ?>
                        <?php
                            // First item Field
                            // This field got the data from detail_belanja or the latest detail_pergeseran record
                            echo $form->field($modelDetailPergeseran, "[{$i}]detail_belanja_id")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(DetailBelanja::getDpdDetailBelanja($rba->rba_id), 'detail_belanja_id', function($data){return $data->item->nama_item;}),
                                'options' => [
                                    'placeholder' => "Pilih Item",
                                    'class' => 'detailBelanja form-control'
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ]
                            ])->label(false);
                        ?>
                        <!-- HTML element for short detail_belanja information -->
                        <!-- Located at the bottom of item -->
                        <p class="harga-satuan"></p>
                        <p class="jumlah-belanja"></p>
                    </td>
                    <td>
                        <?php
                            // Second item field
                            // This field got the data from item table
                            $item = Item::find()->all();
                            echo $form->field($modelDetailPergeseran, "[{$i}]item_id")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map($item, 'item_id', function($item){return $item->nama_item;}),
                                'options' => [
                                    'placeholder' => "Pilih Item",
                                    'class' => 'form-control'
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                ]
                            ])->label(false);
                        ?>
                    </td>
                    <td>
                        <!-- Harga satuan field -->
                        <?= $form->field($modelDetailPergeseran, "[{$i}]harga_satuan", [
                            'inputTemplate' => '
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text font-weight-bold">Rp.</div>
                                    </div>
                                    {input}
                                </div>'
                        ])->label(false)->textInput(['maxlength' => true]); ?>
                    </td>
                    <td>
                        <!-- Jumlah belanja field -->
                        <?= $form->field($modelDetailPergeseran, "[{$i}]jumlah_belanja")->label(false)->textInput(['maxlength' => true]); ?>
                    </td>
                    <td>
                        <?php
                            // Satuan field
                            $satuan = DetailBelanja::find()->all();
                            echo $form->field($modelDetailPergeseran, "[{$i}]satuan_id")->widget(DepDrop::classname(), [
                                'data' => ArrayHelper::map(DetailBelanja::getDetailBelanjaSatuanUpdate([$modelDetailPergeseran->detail_belanja_id]), 'satuan_id', function($data){return $data->satuan->nama_satuan;}),
                                'options' => [
                                    'placeholder' => 'Pilih Satuan',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'depends' => ["detailpergeseran-{$i}-detail_belanja_id"],
                                    'url' => Url::to(['../detail-belanja/dpd-detail-belanja-satuan'])
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

<?php
// Ajax codes to get harga_satuan and jumlah_belanja after chosing first item field
$scriptDetailBelanja = <<< JS
    $(document).on("change", ".detailBelanja", function() {
        var detailId = $(this).val();
        var attrID = $(this).attr("id").replace(/[^0-9.]/g, "");
        $.ajax({
            "url": "../detail-belanja/detail-belanja-list",
            "type": "get",
            "data": { id: detailId },
            success: function(data) {
                var data = $.parseJSON(data);
                console.log(attrID);
                console.log('test');
                $("#detailpergeseran-"+ attrID +"-harga_satuan").attr('value', data.harga_satuan);
                $("#detailpergeseran-"+ attrID +"-detail_belanja_id").closest('tr').find('.harga-satuan').empty().append('Harga: ' + data.harga_satuan);
                $("#detailpergeseran-"+ attrID +"-jumlah_belanja").attr('value', data.jumlah_belanja);
                $("#detailpergeseran-"+ attrID +"-detail_belanja_id").closest('tr').find('.jumlah-belanja').empty().append('Jumlah: ' + data.jumlah_belanja);
            }
        });
    });
JS;
$this->registerJS($scriptDetailBelanja);
?>
