<?php

use app\models\Bidang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BidangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Bidang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bidang-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-sitemap pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Bidang', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>

            <hr class="mb-5 mt-0">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
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
    </div>
</div>
