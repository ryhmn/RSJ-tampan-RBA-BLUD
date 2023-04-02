<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanja $model */

$this->title = 'Update Detail Belanja: ' . $model->detail_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_belanja_id, 'url' => ['view', 'detail_belanja_id' => $model->detail_belanja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-belanja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
