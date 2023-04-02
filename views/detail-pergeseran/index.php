<?php

use app\models\DetailPergeseran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detail Pergeserans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-pergeseran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detail Pergeseran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'detail_pergeseran_id',
            'pergeseran_id',
            'detail_belanja_id',
            'harga_belanja',
            'jumlah_belanja',
            //'satuan_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DetailPergeseran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'detail_pergeseran_id' => $model->detail_pergeseran_id]);
                 }
            ],
        ],
    ]); ?>


</div>
