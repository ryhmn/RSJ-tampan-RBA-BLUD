<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Data Berhasil di Input';
$this->params['breadcrumbs'][] = ['label' => 'Pergeseran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pergeseran-view">

    <p>
        <?= Html::a('Perbarui', ['update', 'pergeseran_id' => $model->pergeseran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'pergeseran_id' => $model->pergeseran_id], [
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
            'tanggal_pergeseran',
            'keterangan:ntext',
            'status',
        ],
    ]) ?>

</div>