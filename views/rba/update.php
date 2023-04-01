<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */

$this->title = 'Update Rba: ' . $model->rba_id;
$this->params['breadcrumbs'][] = ['label' => 'Rbas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rba_id, 'url' => ['view', 'rba_id' => $model->rba_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rba-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
