<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rba $model */

$this->title = 'Create Rba';
$this->params['breadcrumbs'][] = ['label' => 'Rbas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
