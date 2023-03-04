<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Jbelanja $model */

$this->title = 'Update Jenis Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Jbelanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jbelanja-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
