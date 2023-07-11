<?php

use app\models\JenisBelanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\JenisBelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jenis Belanja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-belanja-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="fas fa-tags"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Jenis Belanja', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'value' => 'jenis_belanja',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-transform: capitalize;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, JenisBelanja $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'jenis_belanja_id' => $model->jenis_belanja_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>