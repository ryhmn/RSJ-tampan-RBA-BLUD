<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Belanja $model */

$this->title = 'Create Belanja';
$this->params['breadcrumbs'][] = ['label' => 'Belanjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="belanja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
