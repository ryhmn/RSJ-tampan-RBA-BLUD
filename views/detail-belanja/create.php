<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanja $model */

$this->title = 'Create Detail Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Detail Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-belanja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
