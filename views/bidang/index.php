<?php

use app\models\Bidang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BidangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bidangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bidang-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bidang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bidang_id',
            'nama_bidang',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bidang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bidang_id' => $model->bidang_id]);
                 }
            ],
        ],
    ]); ?>


</div>
