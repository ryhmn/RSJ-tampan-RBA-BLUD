<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dbelanja $model */

$this->title = 'Update Dbelanja: ' . $model->detail_belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Dbelanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->detail_belanja_id, 'url' => ['view', 'detail_belanja_id' => $model->detail_belanja_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dbelanja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
