<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dpergeseran $model */

$this->title = 'Tambah Pergeseran';
$this->params['breadcrumbs'][] = ['label' => 'Detail Pergeseran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpergeseran-create px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
