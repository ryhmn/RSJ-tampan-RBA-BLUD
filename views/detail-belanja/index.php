<?php

use app\models\DetailBelanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detail Belanjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-belanja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detail Belanja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'detail_belanja_id',
            'user_id',
            'belanja_id',
            'item_id',
            'jumlah_belanja',
            //'satuan_id',
            //'harga_satuan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DetailBelanja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'detail_belanja_id' => $model->detail_belanja_id]);
                 }
            ],
        ],
    ]); ?>


</div>
