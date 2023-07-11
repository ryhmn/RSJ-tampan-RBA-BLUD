<?php

use app\models\DetailBelanja;
use app\models\DetailPergeseran;
use app\models\Item;
use app\models\Satuan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

\yii\web\YiiAsset::register($this);

$this->title = "Pergeseran";

$rba = $model->rba->rba_tahun;
$tgl_perg = $model->tanggal_pergeseran;
$ket = $model->keterangan;
$status = $model->status;
?>

<div class="pergeseran-view px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <div class="text-muted rounded py-2 px-3 my-auto pr-5" style="border-left: 4px solid #28a745;">
                    <table class="mr-5">
                        <tr>
                            <td class="py-1">Tahun RBA</td>
                            <td class="px-2">:</td>
                            <td><?= $rba ?></td>
                        </tr>
                        <tr>
                            <td class="py-1" style="width: 140px;">Tanggal Pergeseran</td>
                            <td class="px-2">:</td>
                            <td><?= $tgl_perg ?></td>
                        </tr>
                        <tr>
                            <td class="py-1">Status</td>
                            <td class="px-2">:</td>
                            <td class="text-capitalize"><?= $status ?></td>
                        </tr>
                    </table>
                </div>
                <div class="ml-auto my-auto border border-success w-50 p-2 rounded">
                    <p class="my-1 text-muted"><?= $ket ?></p>
                </div>
            </div>

            <hr class="mb-5 mt-0">

            <p class="text-right">
                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'pergeseran_id' => $model->pergeseran_id], ['class' => 'btn btn-primary mx-1']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'pergeseran_id' => $model->pergeseran_id], [
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
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Jumlah Barang</th>
                        <th class="text-center">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $detail_perg = DetailPergeseran::find()->where(['pergeseran_id' => $model->pergeseran_id])->all();

                    foreach ($detail_perg as $det_perg) :
                    ?>
                        <tr>
                            <td class="text-capitalize"><?= $det_perg->item->nama_item; ?></td>
                            <td class="text-center">
                                <?php
                                $harga = $det_perg->harga_satuan;
                                $harga_f = number_format($harga, '2', ',', '.');
                                echo "Rp. ", $harga_f;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jumlah = $det_perg->jumlah_belanja;
                                $jumlah_bel = number_format($jumlah, '0', ',', '.');
                                echo $jumlah_bel;
                                ?>
                            </td>
                            <td class="text-uppercase text-center"><?= $det_perg->satuan->nama_satuan; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>