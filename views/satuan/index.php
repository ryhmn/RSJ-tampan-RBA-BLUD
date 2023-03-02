<?php

use app\models\Satuan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SatuanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Satuans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Satuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'satuan_id',
            'nama_satuan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Satuan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'satuan_id' => $model->satuan_id]);
                 }
            ],
        ],
    ]); ?>


</div>
