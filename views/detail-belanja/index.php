<?php

use app\models\DetailBelanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DetailBelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Detail Belanja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-belanja-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-tags"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Detail Belanja', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
                <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            </div>

            <hr class="mb-5 mt-0">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items} {pager}',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header' => 'Jenis Belanja',
                        'value' => 'belanja.jenisBelanja.jenis_belanja',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'header' => 'Nama Item',
                        'value' => 'item.nama_item',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'header' => 'Jumlah Belanja',
                        'value' => 'jumlah_belanja',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'header' => 'Satuan',
                        'value' => 'satuan.nama_satuan',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'header' => 'Harga Satuan',
                        'value' => 'harga_satuan',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;'],
                        'format' => ['Currency']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{update} {delete}',
                        'contentOptions' => ['style' => 'text-transform: capitalize; text-align: center;'],
                        'buttons' => [
                            'update' => function ($url, $model) {
                                $url = Url::to(['update', 'detail_belanja_id' => $model->detail_belanja_id]);
                                return Html::a('<i class="fas fa-edit"></i>', $url, [
                                    'title' => "update",
                                    'class' => 'btn btn-primary'
                                ]);
                            },
                            'delete' => function ($url, $model) {
                                $url = Url::to(['delete', 'detail_belanja_id' => $model->detail_belanja_id]);
                                return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                                    'title' => "Delete",
                                    'data-confirm' => Yii::t('yii', 'Ingin menghapus data?'),
                                    'data-method' => 'post',
                                    'class' => 'btn btn-danger ml-1'
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>