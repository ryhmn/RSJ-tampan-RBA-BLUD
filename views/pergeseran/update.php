<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Update Pergeseran: ' . $model->pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pergeseran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pergeseran-update px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>