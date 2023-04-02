<?php

use app\models\Belanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Belanjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="belanja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Belanja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'belanja_id',
            'rba_id',
            'jenis_belanja_id',
            'pagu_indikatif',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Belanja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'belanja_id' => $model->belanja_id]);
                 }
            ],
        ],
    ]); ?>


</div>
