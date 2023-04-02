<?php

use app\models\Pergeseran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PergeseranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pergeserans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pergeseran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pergeseran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pergeseran_id',
            'rba_id',
            'tanggal_pergeseran',
            'keterangan:ntext',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pergeseran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pergeseran_id' => $model->pergeseran_id]);
                 }
            ],
        ],
    ]); ?>


</div>
