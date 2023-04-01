<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanja $model */

$this->title = 'Update Jenis Belanja: ' . $model->jenis_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_belanja_id, 'url' => ['view', 'jenis_belanja_id' => $model->jenis_belanja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-belanja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
