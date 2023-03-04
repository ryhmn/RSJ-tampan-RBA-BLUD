<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Dbelanja $model */

$this->title = 'Tambah Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Belanja', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbelanja-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
