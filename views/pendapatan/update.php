<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Update Pendapatan: ' . $model->pendapatan_id;
$this->params['breadcrumbs'][] = ['label' => 'Pendapatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pendapatan-update px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>