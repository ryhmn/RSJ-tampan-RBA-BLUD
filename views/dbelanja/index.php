<?php

use app\models\Dbelanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DbelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Belanja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dbelanja-index px-2">

    <div class="d-flex mt-4">
        <?= Html::a('Tambah Belanja', ['create'], ['class' => 'btn btn-success align-self-start mr-3']) ?>
        <div class="ml-auto justify-content-center">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items} {pager}',
        'rowOptions' => ['class' => 'text-capitalize'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'belanja_id',
            'item.nama_item',
            'jumlah_belanja',
            'satuan.nama_satuan',
            [
                'header' => 'Harga Satuan',
                'value' => function($model) {
                    $harga = $model->harga_satuan;
                    $harga_f = number_format($harga, '2', ',', '.');
                    return $harga_f;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function($url, $model) {
                        $url = Url::to(['update', 'detail_belanja_id' => $model->detail_belanja_id]);
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url, [
                            'title' => "Edit",
                            'class' => 'btn btn-warning'
                        ]);
                    },
                    'delete' => function($url, $model) {
                        $url = Url::to(['delete', 'detail_belanja_id' => $model->detail_belanja_id]);
                        return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                            'title' => "Hapus",
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
