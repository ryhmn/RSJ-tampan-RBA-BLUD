<?php

use app\models\Pendapatan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PendapatanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pendapatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendapatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pendapatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pendapatan_id',
            'rba_id',
            'parent_pendapatan_id',
            'sumber_pendapatan',
            'jumlah_pendapatan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pendapatan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pendapatan_id' => $model->pendapatan_id]);
                 }
            ],
        ],
    ]); ?>


</div>
