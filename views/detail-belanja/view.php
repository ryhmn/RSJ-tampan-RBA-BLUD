<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var app\models\DetailBelanja $model */

$this->title = 'Detail Belanja';
$this->params['breadcrumbs'][] = ['label' => $model->item->nama_item, 'url' => ['view', 'detail_belanja_id' => $model->item->nama_item]];
$this->params['breadcrumbs'][] = 'Detail Belanja';
\yii\web\YiiAsset::register($this);
?>
<div class="rba-view px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <div class="ml-auto">
                    <?php
                    echo Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [
                            'class' => 'breadcrumb my-auto'
                        ]
                    ]);
                    ?>
                </div>
            </div>

            <hr class="mb-5 mt-0">

            <p class="text-right">
                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'detail_belanja_id' => $model->detail_belanja_id], ['class' => 'btn btn-primary mx-1']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'detail_belanja_id' => $model->detail_belanja_id], [
                    'class' => 'btn btn-danger mx-1',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Nama Item</th>
                        <th class="text-center">Jumlah Belanja</th>
                        <th class="text-center">Satuan</th>
                        <th class="text-center">Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-capitalize"><?= $model->item->nama_item; ?></td>
                        <td class="text-capitalize"><?= $model->jumlah_belanja; ?></td>
                        <td class="text-capitalize"><?= $model->satuan->nama_satuan; ?></td>
                        <td class="text-center">
                            <?php
                            $pagu = $model->harga_satuan;
                            $pagu_f = number_format($pagu, '2', ',', '.');
                            echo "Rp. ", $pagu_f;
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>