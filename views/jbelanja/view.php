<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Jbelanja $model */

$this->title = $model->jenis_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Jbelanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jbelanja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'jenis_belanja_id' => $model->jenis_belanja_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'jenis_belanja_id' => $model->jenis_belanja_id], [
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
            'jenis_belanja_id',
            'parent_jenis_belanja_id',
            'jenis_belanja',
        ],
    ]) ?>

</div>
