<?php

use app\models\Satuan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SatuanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Satuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuan-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="nav-icon fas fa-tasks pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Satuan', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'header' => 'Nama Satuan',
                        'value' => 'nama_satuan',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center; text-transform: capitalize;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Satuan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'satuan_id' => $model->satuan_id]);
                        }
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>
