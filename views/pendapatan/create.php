<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Create Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Pendapatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendapatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
