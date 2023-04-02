<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Create Pergeseran';
$this->params['breadcrumbs'][] = ['label' => 'Pergeserans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergeseran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
