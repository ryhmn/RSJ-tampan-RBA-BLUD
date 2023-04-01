<?php

use app\models\Rba;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RbaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rbas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rba-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rba_id',
            'rba_tahun',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Rba $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'rba_id' => $model->rba_id]);
                 }
            ],
        ],
    ]); ?>


</div>
