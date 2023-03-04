<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Jbelanja $model */

$this->title = 'Tambah Jenis Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Belanja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jbelanja-create px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
