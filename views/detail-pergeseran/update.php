<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseran $model */

$this->title = 'Update Detail Pergeseran: ' . $model->detail_pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Pergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_pergeseran_id, 'url' => ['view', 'detail_pergeseran_id' => $model->detail_pergeseran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-pergeseran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
