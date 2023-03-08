<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dpergeseran $model */

$this->title = 'Update Dpergeseran: ' . $model->detail_pergeseran_id;
$this->params['breadcrumbs'][] = ['label' => 'Dpergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_pergeseran_id, 'url' => ['view', 'detail_pergeseran_id' => $model->detail_pergeseran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dpergeseran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
