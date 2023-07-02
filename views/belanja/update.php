<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */

$this->title = 'Update Belanja: ' . $model->belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->belanja_id, 'url' => ['view', 'belanja_id' => $model->belanja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="belanja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
