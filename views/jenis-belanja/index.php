<?php

use app\models\JenisBelanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Belanjas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-belanja-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Jenis Belanja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jenis_belanja_id',
            'parent_jenis_belanja_id',
            'jenis_belanja',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JenisBelanja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'jenis_belanja_id' => $model->jenis_belanja_id]);
                 }
            ],
        ],
    ]); ?>


</div>
