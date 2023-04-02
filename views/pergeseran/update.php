<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Update Pergeseran: ' . $model->pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pergeseran_id, 'url' => ['view', 'pergeseran_id' => $model->pergeseran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pergeseran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
