<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Update Pendapatan: ' . $model->pendapatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendapatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pendapatan_id, 'url' => ['view', 'pendapatan_id' => $model->pendapatan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendapatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
