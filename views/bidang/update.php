<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bidang $model */

$this->title = 'Update Bidang';
$this->params['breadcrumbs'][] = ['label' => 'Bidangs', 'url' => ['index']];;
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bidang-update px-2">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
