<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pendapatan $model */

$this->title = 'Tambah Pendapatan';
$this->params['breadcrumbs'][] = ['label' => 'Pendapatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendapatan-create px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>