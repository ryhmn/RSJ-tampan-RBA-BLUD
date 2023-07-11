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
<div class="pendapatan-view px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-2">
                <div class="text-muted rounded my-auto">
                    <h5 class="text-muted rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                        Pendapatan
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
                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'pendapatan_id' => $model->pendapatan_id], ['class' => 'btn btn-primary mx-1']) ?>
                <?= Html::a('<i class="fas fa-trash"></i>', ['delete', 'pendapatan_id' => $model->pendapatan_id], [
                    'class' => 'btn btn-danger mx-1',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'sumber_pendapatan',
                    'jumlah_pendapatan',
                ],
            ]) ?>

        </div>