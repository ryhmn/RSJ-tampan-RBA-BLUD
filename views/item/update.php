<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Item $model */

$this->title = 'Update Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-update px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
