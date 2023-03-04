<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */

$this->title = 'Update Belanja: ' . $model->belanja_id;
$this->params['breadcrumbs'][] = ['label' => 'Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="belanja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
