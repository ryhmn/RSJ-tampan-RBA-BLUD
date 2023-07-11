<?php

use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-pills"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Item', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'header' => 'Nama Item',
                        'value' => 'nama_item',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Item $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'item_id' => $model->item_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>