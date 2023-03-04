<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Tambah Pergeseran';
$this->params['breadcrumbs'][] = ['label' => 'Pergeseran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergeseran-create px-2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>