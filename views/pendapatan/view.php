<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = $model->pendapatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendapatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendapatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pendapatan_id' => $model->pendapatan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pendapatan_id' => $model->pendapatan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pendapatan_id',
            'rba_id',
            'parent_pendapatan_id',
            'sumber_pendapatan',
            'jumlah_pendapatan',
        ],
    ]) ?>

</div>
