<?php

use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Pendapatan';
$this->params['breadcrumbs'][] = ['label' => $model->sumber_pendapatan, 'url' => ['view', 'pendapatan_id' => $model->pendapatan_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rba-view px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <h5 class="text-muted font-weight-bol rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-edit pr-1"></i>
                    <?= Html::encode($this->title) ?>
                </h5>
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
                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'pendapatan_id' => $model->pendapatan_id], ['class' => 'btn btn-primary mx-1']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'pendapatan_id' => $model->pendapatan_id], [
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
                        <th class="text-center">Sumber Pendapatan</th>
                        <th class="text-center">Jumlah Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-capitalize"><?= $model->sumber_pendapatan; ?></td>
                        <td class="text-center">
                            <?php
                            $pagu = $model->jumlah_pendapatan;
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