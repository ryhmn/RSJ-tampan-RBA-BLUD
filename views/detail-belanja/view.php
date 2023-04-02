<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanja $model */

$this->title = $model->detail_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detail-belanja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'detail_belanja_id' => $model->detail_belanja_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'detail_belanja_id' => $model->detail_belanja_id], [
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
            'detail_belanja_id',
            'user_id',
            'belanja_id',
            'item_id',
            'jumlah_belanja',
            'satuan_id',
            'harga_satuan',
        ],
    ]) ?>

</div>
