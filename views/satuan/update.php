<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Satuan $model */

$this->title = 'Update Satuan: ' . $model->satuan_id;
$this->params['breadcrumbs'][] = ['label' => 'Satuans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->satuan_id, 'url' => ['view', 'satuan_id' => $model->satuan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
