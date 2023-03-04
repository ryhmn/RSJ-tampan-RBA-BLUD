<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */

$this->title = $model->belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="belanja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'belanja_id' => $model->belanja_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'belanja_id' => $model->belanja_id], [
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
            'belanja_id',
            'rba_id',
            'jenis_belanja_id',
            'pagu_indikatif',
        ],
    ]) ?>

</div>
