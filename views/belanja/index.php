<?php

use app\models\Belanja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BelanjaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pagu Indikatif';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="belanja-index px-3">
    <div class="card">
        <div class="card-body">
            <div class="d-flex mb-0">
                <h4 class="text-uppercase text-muted font-weight-bold rounded py-2 px-3 my-auto" style="border-left: 4px solid #28a745">
                    <i class="nav-icon fas fa-tasks pr-2"></i>
                    <?= Html::encode($this->title); ?>
                </h4>
                <p class="ml-auto my-auto">
                    <?= Html::a('<i class="fas fa-plus mr-1"></i> Tambah Pagu', ['create'], ['class' => 'btn btn-success']) ?>
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
                        'header' => 'Tahun RBA',
                        'value' => 'rba.rba_tahun',
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'header' => 'Jenis Belanja',
                        'value' => 'jenisBelanja.jenis_belanja',
                        'headerOptions' => ['style' => 'text-align: center;'],
                    ],
                    [
                        'header' => 'Pagu Indikatif',
                        'value' => function ($model) {
                            $pagu = $model->pagu_indikatif;
                            $pagu_f = number_format($pagu, '2', ',', '.');
                            return "Rp. $pagu_f";
                        },
                        'headerOptions' => ['style' => 'text-align: center;'],
                        'contentOptions' => ['style' => 'text-align: center;']
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Belanja $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'belanja_id' => $model->belanja_id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
