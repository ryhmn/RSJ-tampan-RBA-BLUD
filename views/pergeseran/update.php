<?php

use yii\helpers\Html;
use yii\bootstrap4\Breadcrumbs;

/** @var yii\web\View $this */
/** @var app\models\Pergeseran $model */

$this->title = 'Edit Pergeseran';
$this->params['breadcrumbs'][] = ['label' => 'Pergeseran', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Edit Pergeseran';
?>

<div class="pergeseran-update px-3">
<div class="card">
        <div class="card-body">
            <div class="mb-4 d-flex">
                <h5 class="text-muted font-weight-bol rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-edit"></i>
                    <?= Html::encode($this->title) ?>
                </h5>
                <div class="ml-auto">
                    <?php
                        echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => [
                                'class' => 'breadcrumb my-auto'
                            ]
                        ]);
                    ?>
                </div>
            </div>
            <?= $this->render('_form', [
                'model' => $model,
                'modelsDetailPergeseran' => $modelsDetailPergeseran
            ]) ?>
        </div>
    </div>
</div>
