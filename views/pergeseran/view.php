<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = $model->pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pergeseran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pergeseran_id' => $model->pergeseran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pergeseran_id' => $model->pergeseran_id], [
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
            'pergeseran_id',
            'rba_id',
            'tanggal_pergeseran',
            'keterangan:ntext',
            'status',
        ],
    ]) ?>

</div>
