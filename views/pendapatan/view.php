<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Data Berhasil di Input';
$this->params['breadcrumbs'][] = ['label' => 'Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pendapatan-view">

    <p>
        <?= Html::a('Perbarui', ['update', 'pendapatan_id' => $model->pendapatan_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'pendapatan_id' => $model->pendapatan_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Kamu yakin ingin menghapus data ini?',
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