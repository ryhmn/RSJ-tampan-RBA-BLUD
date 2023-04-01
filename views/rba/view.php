<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */

$this->title = $model->rba_id;
$this->params['breadcrumbs'][] = ['label' => 'Rbas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rba-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rba_id' => $model->rba_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rba_id' => $model->rba_id], [
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
            'rba_id',
            'rba_tahun',
        ],
    ]) ?>

</div>
