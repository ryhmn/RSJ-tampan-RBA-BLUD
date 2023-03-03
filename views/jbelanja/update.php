<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Jbelanja $model */

$this->title = 'Update Jbelanja: ' . $model->jenis_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Jbelanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_belanja_id, 'url' => ['view', 'jenis_belanja_id' => $model->jenis_belanja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jbelanja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
