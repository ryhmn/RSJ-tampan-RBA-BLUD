<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanja $model */

$this->title = 'Create Jenis Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-belanja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
