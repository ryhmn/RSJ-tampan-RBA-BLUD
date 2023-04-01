<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bidang $model */

$this->title = 'Update Bidang: ' . $model->bidang_id;
$this->params['breadcrumbs'][] = ['label' => 'Bidangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bidang_id, 'url' => ['view', 'bidang_id' => $model->bidang_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bidang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
