<?php

use app\models\Belanja;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */

$this->title = "Detail Penganggaran";
$this->params['breadcrumbs'][] = ['label' => 'Penganggaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$rba = $model->rba_tahun;
?>

<div class="rba-view px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <div class="text-muted rounded my-auto">
                    <h5 class="text-muted rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                        Tahun Anggaran : 
                        <span class="rounded px-2 py-1 text-white font-weight-bolder" style="background-color: #28a745;"><?= $rba ?></span>
                    </h5>
                </div>
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
                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'rba_id' => $model->rba_id], ['class' => 'btn btn-primary mx-1']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'rba_id' => $model->rba_id], [
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
                        <th class="text-center">Jenis Belanja</th>
                        <th class="text-center">Pagu Indikatif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $jenis_bs = Belanja::find()->where(['rba_id' => $model->rba_id])->all(); 

                        foreach ($jenis_bs as $jenis_b):
                    ?>
                    <tr>
                        <td class="text-capitalize"><?= $jenis_b->jenisBelanja->jenis_belanja; ?></td>
                        <td class="text-center">
                            <?php
                                $pagu = $jenis_b->pagu_indikatif;
                                $pagu_f = number_format($pagu, '2', ',', '.');
                                echo "Rp. ", $pagu_f;
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
