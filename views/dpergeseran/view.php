<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Dpergeseran $model */

$this->title = $model->detail_pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Dpergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dpergeseran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'detail_pergeseran_id' => $model->detail_pergeseran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'detail_pergeseran_id' => $model->detail_pergeseran_id], [
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
            'detail_pergeseran_id',
            'pergeseran_id',
            'detail_belanja_id',
            'harga_belanja',
            'jumlah_belanja',
            'satuan_id',
        ],
    ]) ?>

</div>
