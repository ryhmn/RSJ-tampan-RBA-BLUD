<?php

use app\models\DetailPergeseran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailPergeseranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detail Pergeseran';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="detail-pergeseran-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-tasks pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <div class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Detail Pergeseran', ['create'], ['class' => 'btn btn-success']); ?>
                </div>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>

            <hr class="mb-5 mt-0">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
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
    </div>
</div>
