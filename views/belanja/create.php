<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */

$this->title = 'Tambah Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Belanja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="belanja-create px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
